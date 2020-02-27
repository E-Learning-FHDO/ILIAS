<?php
$BEAUT_PATH = realpath(".") . "/Services/COPage/syntax_highlight/php";
if (!isset($BEAUT_PATH)) {
    return;
}
require_once("$BEAUT_PATH/Beautifier/HFile.php");
  class HFile_haskell extends HFile
  {
      public function HFile_haskell()
      {
          $this->HFile();
          /*************************************/
          // Beautifier Highlighting Configuration File
          // Haskell
          /*************************************/
          // Flags

          $this->nocase            	= "0";
          $this->notrim            	= "0";
          $this->perl              	= "0";

          // Colours

          $this->colours        	= array("blue", "purple", "gray", "brown", "blue");
          $this->quotecolour       	= "blue";
          $this->blockcommentcolour	= "green";
          $this->linecommentcolour 	= "green";

          // Indent Strings

          $this->indent            	= array();
          $this->unindent          	= array();

          // String characters and delimiters

          $this->stringchars       	= array("\"", "'");
          $this->delimiters        	= array("(", ")", "{", "}", "[", "]", ";", ",", "`", " ", "	");
          $this->escchar           	= "";

          // Comment settings

          $this->linecommenton     	= array("--");
          $this->blockcommenton    	= array("{-");
          $this->blockcommentoff   	= array("-}");

          // Keywords (keyword mapping to colour number)

          $this->keywords          	= array(
            "(" => "1",
            ")" => "1",
            "Addr" => "1",
            "EQ" => "1",
            "EmptyRec" => "1",
            "EmptyRow" => "1",
            "Either" => "1",
            "False" => "1",
            "FilePath" => "1",
            "GT" => "1",
            "Hugs_Error" => "1",
            "Hugs_ExitWith" => "1",
            "Hugs_Return" => "1",
            "Hugs_SuspendThread" => "1",
            "IO" => "1",
            "IOError" => "1",
            "IOResult" => "1",
            "Just" => "1",
            "LT" => "1",
            "Left" => "1",
            "Maybe" => "1",
            "Nothing" => "1",
            "Ordering" => "1",
            "Rec" => "1",
            "Right" => "1",
            "Ratio" => "1",
            "Rational" => "1",
            "ST" => "1",
            "True" => "1",
            "_" => "2",
            "=" => "2",
            "=>" => "2",
            "|" => "2",
            "<-" => "2",
            "->" => "2",
            "," => "2",
            ".." => "2",
            ":" => "2",
            "::" => "2",
            "class" => "2",
            "case" => "2",
            "data" => "2",
            "deriving" => "2",
            "do" => "2",
            "else" => "2",
            "import" => "2",
            "instance" => "2",
            "if" => "2",
            "in" => "2",
            "let" => "2",
            "module" => "2",
            "newtype" => "2",
            "of" => "2",
            "primitive" => "2",
            "type" => "2",
            "then" => "2",
            "where" => "2",
            "&&" => "3",
            "||" => "3",
            "//" => "3",
            "/=" => "3",
            "/" => "3",
            "==" => "3",
            "!" => "3",
            "!!" => "3",
            "+" => "3",
            "++" => "3",
            "-" => "3",
            "*" => "3",
            "**" => "3",
            "<" => "3",
            "<=" => "3",
            ">" => "3",
            ">>" => "3",
            ">>=" => "3",
            ">=" => "3",
            "abs" => "3",
            "absReal" => "3",
            "accumulate" => "3",
            "acos" => "3",
            "acosh" => "3",
            "all" => "3",
            "and" => "3",
            "any" => "3",
            "appendFile" => "3",
            "applyM" => "3",
            "approxRational" => "3",
            "asTypeOf" => "3",
            "asciiTab" => "3",
            "asin" => "3",
            "asinh" => "3",
            "atan" => "3",
            "atan2" => "3",
            "atanh" => "3",
            "break" => "3",
            "catch" => "3",
            "ceiling" => "3",
            "chr" => "3",
            "compare" => "3",
            "concat" => "3",
            "concatMap" => "3",
            "const" => "3",
            "cos" => "3",
            "cosh" => "3",
            "curry" => "3",
            "cycle" => "3",
            "decodeFloat" => "3",
            "denominator" => "3",
            "digitToInt" => "3",
            "div" => "3",
            "divMod" => "3",
            "doubleToFloat" => "3",
            "doubleToRatio" => "3",
            "doubleToRational" => "3",
            "drop" => "3",
            "dropWhile" => "3",
            "either" => "3",
            "elem" => "3",
            "encodeFloat" => "3",
            "enumFrom" => "3",
            "enumFromThen" => "3",
            "enumFromThenTo" => "3",
            "enumFromTo" => "3",
            "error" => "3",
            "even" => "3",
            "exp" => "3",
            "exponent" => "3",
            "fail" => "3",
            "filter" => "3",
            "flip" => "3",
            "floatDigits" => "3",
            "floatProperFraction" => "3",
            "floatRadix" => "3",
            "floatRange" => "3",
            "floatToRational" => "3",
            "floor" => "3",
            "foldl" => "3",
            "foldl\'" => "3",
            "foldl1" => "3",
            "foldr" => "3",
            "foldr1" => "3",
            "fromDouble" => "3",
            "fromEnum" => "3",
            "fromInt" => "3",
            "fromInteger" => "3",
            "fromIntegral" => "3",
            "fromRational" => "3",
            "fromRealFrac" => "3",
            "fst" => "3",
            "gcd" => "3",
            "getChar" => "3",
            "getContents" => "3",
            "getLine" => "3",
            "guard" => "3",
            "head" => "3",
            "hugsIORun" => "3",
            "hugsPutStr" => "3",
            "id" => "3",
            "inRange" => "3",
            "index" => "3",
            "init" => "3",
            "intToDigit" => "3",
            "intToRatio" => "3",
            "interact" => "3",
            "ioeGetErrorString" => "3",
            "isAlpha" => "3",
            "isAlphanum" => "3",
            "isAscii" => "3",
            "isControl" => "3",
            "isDenormalized" => "3",
            "isDigit" => "3",
            "isHexDigit" => "3",
            "isIEEE" => "3",
            "isInfinite" => "3",
            "isLower" => "3",
            "isNaN" => "3",
            "isNegativeZero" => "3",
            "isOctDigit" => "3",
            "isPrint" => "3",
            "isSpace" => "3",
            "isUpper" => "3",
            "iterate" => "3",
            "last" => "3",
            "lcm" => "3",
            "length" => "3",
            "lex" => "3",
            "lexDigits" => "3",
            "lexLitChar" => "3",
            "lexmatch" => "3",
            "lines" => "3",
            "log" => "3",
            "logBase" => "3",
            "lookup" => "3",
            "map" => "3",
            "mapM" => "3",
            "mapM_" => "3",
            "max" => "3",
            "maxBound" => "3",
            "maximum" => "3",
            "maybe" => "3",
            "min" => "3",
            "minBound" => "3",
            "minimum" => "3",
            "mod" => "3",
            "negate" => "3",
            "nonnull" => "3",
            "not" => "3",
            "notElem" => "3",
            "null" => "3",
            "numerator" => "3",
            "numericEnumFrom" => "3",
            "numericEnumFromThen" => "3",
            "numericEnumFromThenTo" => "3",
            "numericEnumFromTo" => "3",
            "odd" => "3",
            "or" => "3",
            "ord" => "3",
            "otherwise" => "3",
            "pi" => "3",
            "pred" => "3",
            "primAcosDouble" => "3",
            "primAcosFloat" => "3",
            "primAsinDouble" => "3",
            "primAsinFloat" => "3",
            "primAtanDouble" => "3",
            "primAtanFloat" => "3",
            "primCharToInt" => "3",
            "primCmpChar" => "3",
            "primCmpDouble" => "3",
            "primCmpFloat" => "3",
            "primCmpInt" => "3",
            "primCmpInteger" => "3",
            "primCompAux" => "3",
            "primCosDouble" => "3",
            "primCosFloat" => "3",
            "primDivDouble" => "3",
            "primDivFloat" => "3",
            "primDivInt" => "3",
            "primDoubleDecode" => "3",
            "primDoubleDigits" => "3",
            "primDoubleEncode" => "3",
            "primDoubleMaxExp" => "3",
            "primDoubleMinExp" => "3",
            "primDoubleRadix" => "3",
            "primEqChar" => "3",
            "primEqDouble" => "3",
            "primEqFloat" => "3",
            "primEqInt" => "3",
            "primEqInteger" => "3",
            "primEvenInt" => "3",
            "primEvenInteger" => "3",
            "primExitWith" => "3",
            "primExpDouble" => "3",
            "primExpFloat" => "3",
            "primFloatDecode" => "3",
            "primFloatDigits" => "3",
            "primFloatEncode" => "3",
            "primFloatMaxExp" => "3",
            "primFloatMinExp" => "3",
            "primFloatRadix" => "3",
            "primIntToChar" => "3",
            "primIntToDouble" => "3",
            "primIntToFloat" => "3",
            "primIntToInteger" => "3",
            "primIntegerToDouble" => "3",
            "primIntegerToFloat" => "3",
            "primIntegerToInt" => "3",
            "primLogDouble" => "3",
            "primLogFloat" => "3",
            "primMaxInt" => "3",
            "primMinInt" => "3",
            "primMinusDouble" => "3",
            "primMinusFloat" => "3",
            "primMinusInt" => "3",
            "primMinusInteger" => "3",
            "primModInt" => "3",
            "primMulDouble" => "3",
            "primMulFloat" => "3",
            "primMulInt" => "3",
            "primMulInteger" => "3",
            "primNegDouble" => "3",
            "primNegFloat" => "3",
            "primNegInt" => "3",
            "primNegInteger" => "3",
            "primPiDouble" => "3",
            "primPiFloat" => "3",
            "primPlusDouble" => "3",
            "primPlusFloat" => "3",
            "primPlusInt" => "3",
            "primPlusInteger" => "3",
            "primPmFlt" => "3",
            "primPmInt" => "3",
            "primPmInteger" => "3",
            "primPmNpk" => "3",
            "primPmSub" => "3",
            "primQrmInt" => "3",
            "primQrmInteger" => "3",
            "primQuotInt" => "3",
            "primRationalToDouble" => "3",
            "primRationalToFloat" => "3",
            "primRemInt" => "3",
            "primShowsDouble" => "3",
            "primShowsFloat" => "3",
            "primShowsInt" => "3",
            "primShowsInteger" => "3",
            "primSinDouble" => "3",
            "primSinFloat" => "3",
            "primSqrtDouble" => "3",
            "primSqrtFloat" => "3",
            "primTanDouble" => "3",
            "primTanFloat" => "3",
            "primbindIO" => "3",
            "primretIO" => "3",
            "print" => "3",
            "product" => "3",
            "properFraction" => "3",
            "protectEsc" => "3",
            "putChar" => "3",
            "putStr" => "3",
            "putStrLn" => "3",
            "quot" => "3",
            "quotRem" => "3",
            "range" => "3",
            "rangeSize" => "3",
            "rationalToDouble" => "3",
            "rationalToFloat" => "3",
            "rationalToRealFloat" => "3",
            "read" => "3",
            "readDec" => "3",
            "readField" => "3",
            "readFile" => "3",
            "readFloat" => "3",
            "readHex" => "3",
            "readIO" => "3",
            "readInt" => "3",
            "readList" => "3",
            "readLitChar" => "3",
            "readLn" => "3",
            "readOct" => "3",
            "readParen" => "3",
            "readSigned" => "3",
            "reads" => "3",
            "readsPrec" => "3",
            "realFloatToRational" => "3",
            "recip" => "3",
            "reduce" => "3",
            "rem" => "3",
            "repeat" => "3",
            "replicate" => "3",
            "return" => "3",
            "reverse" => "3",
            "round" => "3",
            "scaleFloat" => "3",
            "scanl" => "3",
            "scanl1" => "3",
            "scanr" => "3",
            "scanr1" => "3",
            "seq" => "3",
            "sequence" => "3",
            "show" => "3",
            "showChar" => "3",
            "showField" => "3",
            "showInt" => "3",
            "showList" => "3",
            "showLitChar" => "3",
            "showParen" => "3",
            "showSigned" => "3",
            "showString" => "3",
            "shows" => "3",
            "showsPrec" => "3",
            "significand" => "3",
            "signum" => "3",
            "signumReal" => "3",
            "sin" => "3",
            "sinh" => "3",
            "snd" => "3",
            "span" => "3",
            "splitAt" => "3",
            "sqrt" => "3",
            "strict" => "3",
            "subtract" => "3",
            "succ" => "3",
            "sum" => "3",
            "tail" => "3",
            "take" => "3",
            "takeWhile" => "3",
            "tan" => "3",
            "tanh" => "3",
            "toEnum" => "3",
            "toInt" => "3",
            "toInteger" => "3",
            "toLower" => "3",
            "toRational" => "3",
            "toUpper" => "3",
            "truncate" => "3",
            "uncurry" => "3",
            "undefined" => "3",
            "unlines" => "3",
            "until" => "3",
            "unwords" => "3",
            "unzip" => "3",
            "unzip3" => "3",
            "userError" => "3",
            "words" => "3",
            "writeFile" => "3",
            "zero" => "3",
            "zip" => "3",
            "zip3" => "3",
            "zipWith" => "3",
            "zipWith3" => "3",
            "Bool" => "4",
            "Char" => "4",
            "Float" => "4",
            "Int" => "4",
            "Integer" => "4",
            "Long" => "4",
            "String" => "4",
            "Bounded" => "5",
            "Double" => "5",
            "Enum" => "5",
            "Eq" => "5",
            "Eval" => "5",
            "Functor" => "5",
            "Fractional" => "5",
            "Floating" => "5",
            "Ix" => "5",
            "Integral" => "5",
            "Monad" => "5",
            "MonadZero" => "5",
            "MonadPlus" => "5",
            "Num" => "5",
            "Ord" => "5",
            "Read" => "5",
            "Real" => "5",
            "RealFrac" => "5",
            "RealFloat" => "5",
            "Show" => "5",
            "Void" => "5");

          // Special extensions

          // Each category can specify a PHP function that returns an altered
          // version of the keyword.
        
        

          $this->linkscripts    	= array(
            "1" => "donothing",
            "2" => "donothing",
            "3" => "donothing",
            "4" => "donothing",
            "5" => "donothing");
      }


      public function donothing($keywordin)
      {
          return $keywordin;
      }
  }
