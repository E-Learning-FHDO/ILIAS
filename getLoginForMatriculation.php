<?php


#TODO pfad zu richtiger installations-ini anpassen

//Ilias Konfiguration lesen und parsen
$config=file("data/ilias-fhdo/client.ini.php") or die ("Datei nicht gefunden");
$keys=array("name","host","user","pass","csesecret");
$settings=array();
foreach($config as $val){
	$val=trim($val);
	foreach($keys as $current){
		$ca=getConfig($val,$current);
		if($ca!="")
			$settings[$current]=$ca;
	}

}

//sicherheitsabfrage
//wenn wirklich jemand die url und die parameter erraten sollte muss er noch dieses passwort erraten..
if($_GET['password']!=$settings["csesecret"]){
	echo "nein";
	exit;
}

//mit den gefundenen Werten zur DB verbinden
$mysqli = new mysqli($settings['host'],$settings['user'],$settings['pass'], $settings['name']);


$lookup=$_REQUEST['lookup'];
//$res=mysql_query("SELECT DISTINCT usr_id from usr_data where active=1 AND matriculation='".mysql_real_escape_string($lookup)."'");
$sql = "SELECT DISTINCT usr_id from usr_data where active=1 AND matriculation='"
	.mysqli_real_escape_string($mysqli,$lookup)."'";
$res=$mysqli->query($sql);

if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
}

if(mysqli_num_rows($res) > 0){
	$data = $res->fetch_array();
	echo $data['usr_id'];
}
else{
	echo "-1";
}

//hilfsfunktionen
function getConfig($line,$key){
        if(startsWith($line,$key." =")){
                $ret=substr($line,strpos($line,"\"")+1);
                return substr($ret,0,strlen($ret)-1);
        }
	else
		return "";

}
function startsWith($Haystack, $Needle){
        return strpos($Haystack, $Needle) === 0;
}
?>
