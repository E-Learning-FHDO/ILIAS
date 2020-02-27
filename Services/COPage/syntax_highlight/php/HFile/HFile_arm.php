<?php
$BEAUT_PATH = realpath(".") . "/Services/COPage/syntax_highlight/php";
if (!isset($BEAUT_PATH)) {
    return;
}
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_arm extends HFile
  {
      public function HFile_arm()
      {
          $this->HFile();
          /*************************************/
          // Beautifier Highlighting Configuration File
          // ARM Assembler
          /*************************************/
          // Flags

          $this->nocase            	= "0";
          $this->notrim            	= "0";
          $this->perl              	= "0";

          // Colours

          $this->colours        	= array("gray", "blue", "purple", "gray", "brown", "blue", "purple", "brown");
          $this->quotecolour       	= "blue";
          $this->blockcommentcolour	= "green";
          $this->linecommentcolour 	= "green";

          // Indent Strings

          $this->indent            	= array();
          $this->unindent          	= array();

          // String characters and delimiters

          $this->stringchars       	= array("\"");
          $this->delimiters        	= array("!", "\"", "#", "$", "%", "&", "'", "(", ")", "*", "+", ",", "-", ".", "/", ":", ";", "<", "=", ">", "?", "@", "[", "\\", "]", "^", "_", "`", "{", "|", "}", "~", "	");
          $this->escchar           	= "";

          // Comment settings

          $this->linecommenton     	= array(";");
          $this->blockcommenton    	= array("REM");
          $this->blockcommentoff   	= array("");

          // Keywords (keyword mapping to colour number)

          $this->keywords          	= array(
            "**" => "7",
            "B" => "1",
            "b" => "1",
            "BL" => "1",
            "bl" => "1",
            "BX" => "1",
            "bx" => "1",
            "BLX" => "1",
            "blx" => "1",
            "AND" => "2",
            "and" => "2",
            "EOR" => "2",
            "eor" => "2",
            "SUB" => "2",
            "sub" => "2",
            "RSB" => "2",
            "rsb" => "2",
            "ADD" => "2",
            "add" => "2",
            "ADC" => "2",
            "adc" => "2",
            "SBC" => "2",
            "sbc" => "2",
            "RSC" => "2",
            "rsc" => "2",
            "TST" => "2",
            "tst" => "2",
            "TEQ" => "2",
            "teq" => "2",
            "CMP" => "2",
            "cmp" => "2",
            "CMN" => "2",
            "cmn" => "2",
            "ORR" => "2",
            "orr" => "2",
            "MOV" => "2",
            "mov" => "2",
            "BIC" => "2",
            "bic" => "2",
            "MVN" => "2",
            "mvn" => "2",
            "LSL" => "2",
            "lsl" => "2",
            "LSR" => "2",
            "lsr" => "2",
            "ASL" => "2",
            "asl" => "2",
            "ASR" => "2",
            "asr" => "2",
            "ROR" => "2",
            "ror" => "2",
            "RRX" => "2",
            "rrx" => "2",
            "NEG" => "2",
            "neg" => "2",
            "MUL" => "3",
            "mul" => "3",
            "MLA" => "3",
            "mla" => "3",
            "SMULL" => "3",
            "smull" => "3",
            "UMULL" => "3",
            "umull" => "3",
            "SMLAL" => "3",
            "smlal" => "3",
            "UMLAL" => "3",
            "umlal" => "3",
            "LDR" => "4",
            "ldr" => "4",
            "STR" => "4",
            "str" => "4",
            "LDM" => "4",
            "ldm" => "4",
            "STM" => "4",
            "stm" => "4",
            "SWP" => "4",
            "swp" => "4",
            "PUSH" => "7",
            "push" => "4",
            "POP" => "7",
            "pop" => "4",
            "SWI" => "5",
            "swi" => "5",
            "BKPT" => "5",
            "bkpt" => "5",
            "CLZ" => "6",
            "clz" => "6",
            "MRS" => "6",
            "mrs" => "6",
            "MSR" => "6",
            "msr" => "6",
            "CDP" => "6",
            "cdp" => "6",
            "MRC" => "6",
            "mrc" => "6",
            "MCR" => "6",
            "mcr" => "6",
            "LDC" => "6",
            "ldc" => "6",
            "STC" => "6",
            "stc" => "6",
            "OPT" => "7",
            "EXT" => "7",
            "EQU" => "7",
            "DC" => "7",
            "ALIGN" => "7",
            "ADR" => "7",
            "RN" => "7",
            "FN" => "7",
            "DIV" => "7",
            "SQR" => "7",
            "SWAP" => "7",
            "VDU" => "7",
            "NOP" => "7",
            "BRK" => "7",
            "SMUL" => "7",
            "UMUL" => "7",
            "SMLA" => "7",
            "UMLA" => "7",
            "LDF" => "7",
            "STF" => "7",
            "ASSERT" => "7",
            "FILL" => "7",
            "FILE" => "7",
            "COND" => "7",
            "HEAD" => "7",
            "ORG" => "7",
            "CN" => "7",
            "CP" => "7",
            "DN" => "7",
            "EXPORT" => "7",
            "GLOBAL" => "7",
            "EXTERN" => "7",
            "GBL" => "7",
            "IMPORT" => "7",
            "KEEP" => "7",
            "LCL" => "7",
            "RLIST" => "7",
            "SET" => "7",
            "SN" => "7",
            "DATA" => "7",
            "FIELD" => "7",
            "LTORG" => "7",
            "MAP" => "7",
            "SPACE" => "7",
            "ELSE" => "7",
            "ENDIF" => "7",
            "GET" => "7",
            "INCLUDE" => "7",
            "IF" => "7",
            "INCBIN" => "7",
            "MACRO" => "7",
            "MEND" => "7",
            "MEXIT" => "7",
            "WEND" => "7",
            "WHILE" => "7",
            "ENDFUNC" => "7",
            "ENDP" => "7",
            "FRAME" => "7",
            "ADDRESS" => "7",
            "REGISTER" => "7",
            "RESTORE" => "7",
            "SAVE" => "7",
            "STATE" => "7",
            "REMEMBER" => "7",
            "FUNCTION" => "7",
            "PROC" => "7",
            "AREA" => "7",
            "CODE16" => "7",
            "CODE32" => "7",
            "END" => "7",
            "ENTRY" => "7",
            "INFO" => "7",
            "NOFP" => "7",
            "REQUIRE" => "7",
            "ROUT" => "7",
            "SUBT" => "7",
            "TTL" => "7",
            "VFPASSERT" => "7",
            "SCALAR" => "7",
            "VECTOR" => "7",
            "FLD" => "7",
            "A1" => "8",
            "A2" => "8",
            "A3" => "8",
            "A4" => "8",
            "F0" => "8",
            "F1" => "8",
            "F2" => "8",
            "F3" => "8",
            "F4" => "8",
            "F5" => "8",
            "F6" => "8",
            "F7" => "8",
            "FP" => "8",
            "IP" => "8",
            "LR" => "8",
            "PC" => "8",
            "R0" => "8",
            "R1" => "8",
            "R10" => "8",
            "R11" => "8",
            "R12" => "8",
            "R13" => "8",
            "R14" => "8",
            "R15" => "8",
            "R2" => "8",
            "R3" => "8",
            "R4" => "8",
            "R5" => "8",
            "R6" => "8",
            "R7" => "8",
            "R8" => "8",
            "R9" => "8",
            "SL" => "8",
            "SP" => "8",
            "V1" => "8",
            "V2" => "8",
            "V3" => "8",
            "V4" => "8",
            "V5" => "8",
            "V6" => "8",
            "a1" => "8",
            "a2" => "8",
            "a3" => "8",
            "a4" => "8",
            "f0" => "8",
            "f1" => "8",
            "f2" => "8",
            "f3" => "8",
            "f4" => "8",
            "f5" => "8",
            "f6" => "8",
            "f7" => "8",
            "fp" => "8",
            "ip" => "8",
            "lr" => "8",
            "pc" => "8",
            "r0" => "8",
            "r1" => "8",
            "r10" => "8",
            "r11" => "8",
            "r12" => "8",
            "r13" => "8",
            "r14" => "8",
            "r15" => "8",
            "r2" => "8",
            "r3" => "8",
            "r4" => "8",
            "r5" => "8",
            "r6" => "8",
            "r7" => "8",
            "r8" => "8",
            "r9" => "8",
            "sl" => "8",
            "sp" => "8",
            "v1" => "8",
            "v2" => "8",
            "v3" => "8",
            "v4" => "8",
            "v5" => "8",
            "v6" => "8");

          // Special extensions

          // Each category can specify a PHP function that returns an altered
          // version of the keyword.
        
        

          $this->linkscripts    	= array(
            "7" => "donothing",
            "1" => "donothing",
            "2" => "donothing",
            "3" => "donothing",
            "4" => "donothing",
            "5" => "donothing",
            "6" => "donothing",
            "8" => "donothing");
      }


      public function donothing($keywordin)
      {
          return $keywordin;
      }
  }
