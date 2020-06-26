<?php
/*
	+-----------------------------------------------------------------------------+
	| ILIAS open source                                                           |
	+-----------------------------------------------------------------------------+
	| Copyright (c) 1998-2006 ILIAS open source, University of Cologne            |
	|                                                                             |
	| This program is free software; you can redistribute it and/or               |
	| modify it under the terms of the GNU General Public License                 |
	| as published by the Free Software Foundation; either version 2              |
	| of the License, or (at your option) any later version.                      |
	|                                                                             |
	| This program is distributed in the hope that it will be useful,             |
	| but WITHOUT ANY WARRANTY; without even the implied warranty of              |
	| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               |
	| GNU General Public License for more details.                                |
	|                                                                             |
	| You should have received a copy of the GNU General Public License           |
	| along with this program; if not, write to the Free Software                 |
	| Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA. |
	+-----------------------------------------------------------------------------+
*/

include_once './Services/LDAP/classes/class.ilLDAPPlugin.php';

/** 
* 
* 
* @author Jan Rocho <jan.rocho@fh-dortmund.de>
* @version $Id$
* 
*
*/
class ilRoleAssignmentPlugin extends ilLDAPPlugin implements ilLDAPRoleAssignmentPlugin
{
	private static $ldap_query = null;
	
	private static $assignments = null;
    
    private static $ldap_debug = 1;
	
	/**
	 * Get name of plugin.
	 */
	public function getPluginName()
	{
		return 'RoleAssignment';
	}
	
    /**
     * @see ilLDAPRoleAssignmentPlugin::getAdditionalAttributeNames()
     */
	public function getAdditionalAttributeNames()
	{	
		return array('anAdditionalLDAPField');
	}


	/**
	 * check role assignment for a specific plugin id 
	 * (defined in the shibboleth role assignment administration).
	 * 
	 * @param int	$a_plugin_id	Unique plugin id
	 * @param array $a_user_data	Array with user data ($_SERVER)
	 * @return bool whether the condition is fullfilled or not	
	 */
	public function checkRoleAssignment($a_plugin_id,$a_user_data)
	{
		global $ilLog,$ilIliasIniFile;
        
        // debug or not to debug
        if($ilIliasIniFile->variableExists("fhdo","ldap_debug"))
            $this->ldap_debug = $ilIliasIniFile->readVariable("fhdo","ldap_debug");
	
        if($ldap_debug)
            $ilLog->write(__METHOD__.': Starting plugin assignments');
		
		/*
			3 - IuE
			4 - InfiniteIterator
			5 - Maschinenbau
			8 - Soz
			9 - Wirt
			*/
							
																		
							
		// Mapping Plugin-ID -> Keys aus LDAP
		$mapping = array(
							10 => array('Student'),
							20 => array('Mitarbeiter'),
							30 => array('Affiliate'),
							31 => array('AF.THK'),
							40 => array('verbundstudent-wi'),
							100 => array('FB1'),
							200 => array('FB2'),
							300 => array('FB3'),
							400 => array('FB4'),
							401 => array('84.000.278.FB4','84.000.VWI.THK','AF.THK'),
                            402 => array('90.000.278.FB4','90.000.VWI.THK','AF.THK'),
							500 => array('FB5'),
							600 => array('FB6','V6'),
							800 => array('FB8'),
							900 => array('FB9'),
							950 => array('FB10')
						);
						
		
						
		
		
		// DEBUG
		//$a_user_data['edupersonscopedaffiliation'] = array('Mitarbeiter@FB10.fh-dortmund.de');

		
		/****************************
		 * fake the description field for certain FB
		 */
		 
		 
		//$GLOBALS['ilLog']->write(__METHOD__.': DUMP-ORIG :'. var_dump($a_user_data['edupersonscopedaffiliation']));
		  
		if(!is_array($a_user_data['edupersonscopedaffiliation'])) {
			$studiengang = $this->_sortUser($a_user_data['edupersonscopedaffiliation'],false);
			
            if($this->ldap_debug)
                $ilLog->write(__METHOD__.': NO-ARRAY:'.$studiengang['status']);
			
			// add the fake fields
			$a_user_data['edupersonscopedaffiliation'] = $this->_addDescFields($studiengang);			
		}
		else
		{
			foreach($a_user_data['edupersonscopedaffiliation'] as $key2 => $value2) {
				$studiengang = $this->_sortUser($value2,$a_user_data['edupersonscopedaffiliation']);
				
                if($this->ldap_debug)
                    $ilLog->write(__METHOD__.': ARRAY:'.$studiengang['status']);
			
				// add the fake fields
				$a_user_data['edupersonscopedaffiliation'] = $this->_addDescFields($studiengang);	
			} // end: foreach($a_user_data['description'] as $key => $value) 
			
			//$GLOBALS['ilLog']->write(__METHOD__.': ARRAY-COMPLETE:'.var_dump($a_user_data['edupersonscopedaffiliation']));
		} // end:  !is_array($a_user_data['description'])
			


		/****************************
		 * do the assignment
		 */
		 
		if(!is_array($a_user_data['edupersonscopedaffiliation'])) {
	     	$studiengang = $this->_sortUser($a_user_data['edupersonscopedaffiliation'],false);
	     	
	     	if($this->ldap_debug)
                $ilLog->write(__METHOD__.': AFFFOUND-OBEN:'.$studiengang['status']);
				
	     	// Wenn kein Studiengang dann nichts zuweisen
			if($studiengang == false)
				return false;
			
			if(is_array($mapping[$a_plugin_id])) {
				if(in_array($studiengang['fb'],$mapping[$a_plugin_id]))
					return true;
					
				if(in_array($studiengang['qualification'].'.'.$studiengang['focus'].'.'.$studiengang['course'].'.'.$studiengang['fb'],$mapping[$a_plugin_id]))
					return true;
					
				if($studiengang['status'] == 'Affiliate')
				{
					if(in_array('AF.'.$studiengang['fb'],$mapping[$a_plugin_id]))
						return true;
						
					if($this->ldap_debug)	
					   $ilLog->write(__METHOD__.': Assigning Affiliate:'.$studiengang['fb']);
				}
				
				// Set Mitarbeiter / Student / Affiliate Rolle
				if(in_array($studiengang['status'],$mapping[$a_plugin_id]))
				{
					return true;
				}
										
			}
			
			//print_r($studiengang,true);
					
		} else {
							
			foreach($a_user_data['edupersonscopedaffiliation'] as $key => $value) {
				$studiengang = $this->_sortUser($value,$a_user_data['edupersonscopedaffiliation']);
				
				if($this->ldap_debug)
				    $ilLog->write(__METHOD__.': AFFFOUND:'.$studiengang['status']);
				//print_r($studiengang,true);
				//echo var_dump($studiengang);
				
				// Wenn kein Studiengang dann nichts zuweisen
				if($studiengang == false)
					return false;

				if(is_array($mapping[$a_plugin_id])) {
					if(in_array($studiengang['fb'],$mapping[$a_plugin_id]))
						return true;
				
					if(in_array($studiengang['qualification'].'.'.$studiengang['focus'].'.'.$studiengang['course'].'.'.$studiengang['fb'],$mapping[$a_plugin_id]))
						return true;
			
						
					if($studiengang['status'] == 'Affiliate')
					{
						if(in_array('AF.'.$studiengang['fb'],$mapping[$a_plugin_id])) {
							return true;
							
						}
						
                        if($this->ldap_debug)
						  $ilLog->write(__METHOD__.': Assigning Affiliate:'.$studiengang['fb']);
					}
					
					// Set Mitarbeiter / Student / Affiliate Rolle
					if(in_array($studiengang['status'],$mapping[$a_plugin_id]))
						return true;
					
				}
				
                if($this->ldap_debug)
				    $ilLog->write(__METHOD__.': New User FB:'.$studiengang['fb']);
				
			}
			
		}
		

		return false;
	}
	
	// Split LDAP description string
	private function _sortUser($description,$orig_description)
	{	
        global $ilLog;
	
		/* Spezielle Institutionen die bei der die Affiliate anhand der Institution 
			behandelt wird.
		*/
	   
		$institutions = array(
			'THK'
			);

		// split the string
		$type = explode('@',$description);
		$attr = explode(".",$type[1]);
		
		// set original description field for orig
		if($orig_description) {
			$orig_description = $orig_description;
		}
		else
		{
			$orig_description = $description;
		}

		
		// check original for a special institution
		$special = 0;
		if(is_array($orig_description))
		{
            if($this->ldap_debug)
                $ilLog->write(__METHOD__.': Run orig: yes');		
			$orig_type = explode('@',$orig_description[0]);
			$orig_attr = explode(".",$orig_type[1]);
			
			if(in_array($orig_attr[1],$institutions))
				$special = 1;
		} else {
			if($this->ldap_debug)
                $ilLog->write(__METHOD__.': Run orig: no');		
		}
		
		// build the returned data array
		switch($type[0]) {		
			case 'Mitarbeiter':	
			
				$data = array('fb' => $attr[1],
							  'status' => 'Mitarbeiter',
							  'orig' => $orig_description);
			
				break;
				
			case 'affiliate':
				//if(in_array($attr[1],$institutions) && $special == 1)
				//{
					$data = array('fb' => $attr[1],
								  'status' => 'Affiliate',
								  'orig' => $orig_description);
					
					//$return = print_r($data,true);
					if($this->ldap_debug)
                        $ilLog->write(__METHOD__.': AFFILIATE - ');		
					//print_r($data);								  
				//} 
								
				break;
				
			case 'ExMA':			
				$data = array('fb' => 'ExMA',
							  'status' => 'Mitarbeiter',
							  'orig' => $orig_description);
				break;
				
			case 'Student':
			case 'verbundstudent-wi':
			
				// take type as identifier
				$data = array('qualification' => $attr[0],
						  'focus' => $attr[1],
						  'course' => $attr[2],
						  'fb' => $attr[3],
						  'status' => $type[0],
						  'orig' => $orig_description);
				break;
			case 'ExStud':
				$data = array('qualification' => '00',
						  'focus' => '000',
						  'course' => '000',
						  'fb' => 'ExStud',
						  'status' => 'Student',
						  'orig' => $orig_description);
				break;

		}
							  
		return $data;
	}
	
	// Add fake description fields
	private function _addDescFields($studiengang) {
	
		// connect different FB				
		$mappingMulti = array(
							'FB5' => array('FB3'),
							'FB3' => array('FB5')
							);
		
		if(array_key_exists($studiengang['fb'],$mappingMulti)) {
				
			// first set original description field
			if(!is_array($studiengang['orig'])) {
				$a_user_data['edupersonscopedaffiliation'] = array($studiengang['orig']);
			}
			else
			{
				$a_user_data['edupersonscopedaffiliation'] = array();
				foreach($studiengang['orig'] as $keyDesc => $valueDesc) {
					array_push($a_user_data['edupersonscopedaffiliation'],$valueDesc);
				}
			}


			// add all other FB roles
			$fb = $studiengang['fb'];				
			foreach($mappingMulti[$fb] as $key => $value) {
			
				if($studiengang['status'] == 'Mitarbeiter') 
					$add_description = 'Mitarbeiter@000.'.$value.'.fh-dortmund.de';
			
				if($studiengang['status'] == 'Student')
					$add_description = 'Student@00.000.000.'.$value.'.fh-dortmund.de';
					
				//if($studiengang['status'] == 'Affiliate')
				//	$add_description = 'affiliate@AF.'.$value.'.fh-dortmund.de';
			
				array_push($a_user_data['edupersonscopedaffiliation'], $add_description);	
			} // end: foreach $mappingMulti
			
			$newDesc = $a_user_data['edupersonscopedaffiliation'];	
		} // end: array_key_exists($studiengang['fb'],$mappingMulti
		else
		{
			$newDesc = $studiengang['orig'];
		}
		return $newDesc;
	}
}
?>
