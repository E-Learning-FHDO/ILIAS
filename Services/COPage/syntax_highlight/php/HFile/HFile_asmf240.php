<?php
$BEAUT_PATH = realpath(".") . "/Services/COPage/syntax_highlight/php";
if (!isset($BEAUT_PATH)) {
    return;
}
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_asmf240 extends HFile
  {
      public function HFile_asmf240()
      {
          $this->HFile();
          /*************************************/
          // Beautifier Highlighting Configuration File
//
          /*************************************/
          // Flags

          $this->nocase            	= "0";
          $this->notrim            	= "0";
          $this->perl              	= "0";

          // Colours

          $this->colours        	= array("brown", "blue", "purple", "gray", "blue");
          $this->quotecolour       	= "blue";
          $this->blockcommentcolour	= "green";
          $this->linecommentcolour 	= "green";

          // Indent Strings

          $this->indent            	= array();
          $this->unindent          	= array();

          // String characters and delimiters

          $this->stringchars       	= array();
          $this->delimiters        	= array(",", "(", ")", "{", "}", "[", "]", "-", "+", "*", "/", "=", "\"", "'", "!", "&", "|", "\\", "<", ">", " ", "?", ":", ";");
          $this->escchar           	= "";

          // Comment settings

          $this->linecommenton     	= array("");
          $this->blockcommenton    	= array("");
          $this->blockcommentoff   	= array("");

          // Keywords (keyword mapping to colour number)

          $this->keywords          	= array(
            "/L10" => "",
            "\"F240\"" => "",
            "Line" => "",
            "Comment" => "",
            "=" => "4",
            ";" => "",
            "Block" => "",
            "On" => "",
            "Off" => "",
            "Escape" => "",
            "Char" => "",
            "\\" => "",
            "String" => "",
            "Chars" => "",
            "\"'" => "",
            "File" => "",
            "Extensions" => "",
            "A" => "",
            "ASM" => "",
            "ABS" => "1",
            "ADD" => "1",
            "ADDC" => "1",
            "ADDH" => "1",
            "ADDK" => "1",
            "ADDS" => "1",
            "ADDT" => "1",
            "ADLK" => "1",
            "ADRK" => "1",
            "AND" => "1",
            "ANDK" => "1",
            "APAC" => "1",
            "B" => "1",
            "BACC" => "1",
            "BANZ" => "1",
            "BBNZ" => "1",
            "BBZ" => "1",
            "BC" => "1",
            "BCND" => "1",
            "BGEZ" => "1",
            "BGZ" => "1",
            "BIOZ" => "1",
            "BIT" => "1",
            "BITT" => "1",
            "BLDD" => "1",
            "BLEZ" => "1",
            "BLKD" => "1",
            "BLKP" => "1",
            "BLPD" => "1",
            "BLZ" => "1",
            "BNC" => "1",
            "BNV" => "1",
            "BNZ" => "1",
            "BV" => "1",
            "BZ" => "1",
            "CALA" => "1",
            "CALL" => "1",
            "CC" => "1",
            "CLRC" => "1",
            "CMPL" => "1",
            "CMPR" => "1",
            "CNFD" => "1",
            "CNFP" => "1",
            "DINT" => "1",
            "DMOV" => "1",
            "EINT" => "1",
            "IDLE" => "1",
            "IN" => "1",
            "INTR" => "1",
            "LAC" => "1",
            "LACC" => "1",
            "LACL" => "1",
            "LACT" => "1",
            "LALK" => "1",
            "LAR" => "1",
            "LARP" => "1",
            "LDP" => "1",
            "LDPK" => "1",
            "LPH" => "1",
            "LRLK" => "1",
            "LST" => "1",
            "LST1" => "1",
            "LT" => "1",
            "LTA" => "1",
            "LTD" => "1",
            "LTP" => "1",
            "LTS" => "1",
            "MAC" => "1",
            "MACD" => "1",
            "MAR" => "1",
            "MPY" => "1",
            "MPYA" => "1",
            "MPYK" => "1",
            "MPYS" => "1",
            "MPYU" => "1",
            "NEG" => "1",
            "NMI" => "1",
            "NOP" => "1",
            "NORM" => "1",
            "OR" => "1",
            "ORK" => "1",
            "OUT" => "1",
            "PAC" => "1",
            "POP" => "1",
            "POPD" => "1",
            "BeautifierD" => "1",
            "PUSH" => "1",
            "RC" => "1",
            "RET" => "1",
            "RETC" => "1",
            "RHM" => "1",
            "ROL" => "1",
            "ROR" => "1",
            "ROVM" => "1",
            "RPT" => "1",
            "RPTK" => "1",
            "RSXM" => "1",
            "RTC" => "1",
            "RXF" => "1",
            "SACH" => "1",
            "SACL" => "1",
            "SAR" => "1",
            "SBRK" => "1",
            "SC" => "1",
            "SETC" => "1",
            "SFL" => "1",
            "SFR" => "1",
            "SHM" => "1",
            "SOVM" => "1",
            "SPAC" => "1",
            "SPH" => "1",
            "SPL" => "1",
            "SPLK" => "1",
            "SPM" => "1",
            "SQRA" => "1",
            "SQRS" => "1",
            "SST" => "1",
            "SSXM" => "1",
            "STC" => "1",
            "SUB" => "1",
            "SUBB" => "1",
            "SUBC" => "1",
            "SUBH" => "1",
            "SUBK" => "1",
            "SUBS" => "1",
            "SUBT" => "1",
            "SXF" => "1",
            "TBLR" => "1",
            "TBLW" => "1",
            "TRAP" => "1",
            "XOR" => "1",
            "ZALR" => "1",
            ".align" => "2",
            ".asect" => "2",
            ".asg" => "2",
            ".bes" => "2",
            ".bfloat" => "2",
            ".blong" => "2",
            ".break" => "2",
            ".bss" => "2",
            ".byte" => "2",
            ".copy" => "2",
            ".data" => "2",
            ".def" => "2",
            ".double" => "2",
            ".drlist" => "2",
            ".drnolist" => "2",
            ".else" => "2",
            ".elseif" => "2",
            ".emsg" => "2",
            ".end" => "2",
            ".endif" => "2",
            ".endm" => "2",
            ".endloop" => "2",
            ".endstruct" => "2",
            ".equ" => "2",
            ".eval" => "2",
            ".even" => "2",
            ".fclist" => "2",
            ".fcnolist" => "2",
            ".field" => "2",
            ".float" => "2",
            ".global" => "2",
            ".hword" => "2",
            ".ieee" => "2",
            ".if" => "2",
            ".include" => "2",
            ".int" => "2",
            ".label" => "2",
            ".ldouble" => "2",
            ".length" => "2",
            ".list" => "2",
            ".long" => "2",
            ".loop" => "2",
            ".macro" => "2",
            ".mlib" => "2",
            ".mlist" => "2",
            ".mmregs" => "2",
            ".mmsg" => "2",
            ".mnolist" => "2",
            ".newblock" => "2",
            ".nolist" => "2",
            ".option" => "2",
            ".page" => "2",
            ".port" => "2",
            ".ref" => "2",
            ".regalias" => "2",
            ".sblock" => "2",
            ".sect" => "2",
            ".set" => "2",
            ".sfloat" => "2",
            ".space" => "2",
            ".sslist" => "2",
            ".ssnolist" => "2",
            ".start" => "2",
            ".string" => "2",
            ".struct" => "2",
            ".tab" => "2",
            ".tag" => "2",
            ".text" => "2",
            ".title" => "2",
            ".usect" => "2",
            ".version" => "2",
            ".width" => "2",
            ".wmsg" => "2",
            ".word" => "2",
            "ACC" => "3",
            "AR0" => "3",
            "AR1" => "3",
            "AR2" => "3",
            "AR3" => "3",
            "AR4" => "3",
            "AR5" => "3",
            "AR6" => "3",
            "AR7" => "3",
            "ARB" => "3",
            "ARP" => "3",
            "BIO" => "3",
            "C" => "3",
            "CNF" => "3",
            "DP" => "3",
            "EQ" => "3",
            "GEQ" => "3",
            "GT" => "3",
            "INTM" => "3",
            "LEQ" => "3",
            "NC" => "3",
            "NEQ" => "3",
            "NOV" => "3",
            "NTC" => "3",
            "OV" => "3",
            "OVM" => "3",
            "PM" => "3",
            "SP" => "3",
            "ST" => "3",
            "SXM" => "3",
            "TC" => "3",
            "XF" => "3",
            "+" => "4",
            "-" => "4",
            "//" => "4",
            "/" => "4",
            "%" => "4",
            "&" => "4",
            ">" => "4",
            "<" => "4",
            "^" => "4",
            "!" => "4",
            "|" => "4",
            ".cinit" => "5",
            ".const" => "5",
            ".stack" => "5",
            ".switch" => "5",
            ".sysmem" => "5",
            ".vector" => "5",
            ".vectors" => "5");

          // Special extensions

          // Each category can specify a PHP function that returns an altered
          // version of the keyword.
        
        

          $this->linkscripts    	= array(
            "" => "donothing",
            "4" => "donothing",
            "1" => "donothing",
            "2" => "donothing",
            "3" => "donothing",
            "5" => "donothing");
      }


      public function donothing($keywordin)
      {
          return $keywordin;
      }
  }
