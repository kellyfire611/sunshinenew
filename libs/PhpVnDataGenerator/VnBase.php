<?php
/**
  * Test
  * 
  * 
  * @package PhpVnDataGenerator
  * @author  Võ Hồng Khanh <khanhvohong@gmail.com>
  * @license LGPL
  * @version 1.0   
  */

/**
  * @package PhpVnDataGenerator
  */
namespace Illuminate\PhpVnDataGenerator;

/**
  * @class VnBase Define constants and feature methods.
  */
class VnBase
{
    /** -------------------- Constant for gender -------------------- */
    /** @const int VnMixed           Constant. Mixed value. */
	const VnMixed                    = 15;

    /** @const int VnMale            Constant. For male. */
    const VnMale                     = 1;

    /** @const int VnFemale          Constant. For female. */
    const VnFemale                   = 0;

    /** -------------------- Constant for boolean -------------------- */
    /** @const int VnTrue            Constant. For true value. */
    const VnTrue                     = 1;

    /** @const int VnFalse           Constant. For false value. */
    const VnFalse                    = 0;

    /** -------------------- Constant for full name extract -------------------- */
    /** @const int VnFull            Constant. Extract full name. */
    const VnFull                     = 0;

    /** @const int VnSubname         Constant. Extract sub name. */
    const VnSubName                  = 0;

    /** @const int VnFamily          Constant. Extract family. */
    const VnFamily                   = 1;

    /** @const int VnMotherFamily    Constant. Extract family. */
    const VnMotherFamily             = 2;

    /** @const int VnFirstName       Constant. Extract first name. */
    const VnFirstName                = 3;

    /** @const int VnThi             Constant. Checks Thi sub name for female. */
    const VnThi                      = 4;

    /** @const int VnVan             Constant. Checks Van sub name for male. */
    const VnVan                      = 5;

    /** -------------------- Constant for array sorting -------------------- */
    /** @const bool VnSorting        Constant. Sort array. */
    const VnSorting                  = true;

    /** @const bool VnNotSorting     Constant. UnSort array. */
    const VnNotSorting               = false;

    /** -------------------- Constant for phone -------------------- */
    /** @const int VnMobile          Constant. Generate Mobile. */
    const VnMobile                   = 1;

    /** @const int VnTelephone       Constant. Generate Telephone. */
    const VnTelephone                = 0;

    /** -------------------- Constant for phone format -------------------- */
    /** @const int VnTelephoneClean  Constant. Telephone will not have any delimiter. */
    const VnTelephoneClean           = 0; // 07103000111

    /** @const int VnTelephoneDot    Constant. Telephone divide by . delimiter. */
    const VnTelephoneDot             = 1; // 07103.000111

    /** @const int VnTelephoneMinus  Constant. Telephone divide by - delimiter. */
    const VnTelephoneMinus           = 2; // 07103-000111

    /** @const int VnTelephoneSpace  Constant. Telephone divide by space delimiter. */
    const VnTelephoneSpace           = 3; // 07103 000111

    /** @const int VnTelephoneOptional Constant. Telephone divide by () delimiter. */
    const VnTelephoneOptional        = 4; // (07103)000111

    /** -------------------- Constant for random string generate -------------------- */
    /** @const int VnNonZeroDigit    Constant. Generate number with non-zero for first digit. */
    const VnNonZeroDigit             = 0;

    /** @const int VnDigit           Constant. Generate random string that have digit. */
    const VnDigit                    = 1;

    /** @const int VnWord            Constant. Generate random string that have word. */
    const VnWord                     = 2;

    /** @const int Sign              Constant. Generate random string that have sign. */
    const VnSign                     = 4;

    /** @const int VnWord            Constant. Generate random string that have space. */
    const VnSpace                    = 8;

    /** @const int VnCustom          Constant. Generate random string using custom pattern. */
    const VnCustom                   = 16;

    /** -------------------- Constant for string transforming -------------------- */
    /** @const int VnCaseN           Constant. Number of case. */
    const VnCaseN                    = 3;

    /** @const int VnCapitalize      Constant. Tranform string into capitalize. */
    const VnCapitalize               = 0;

    /** @const int VnLowerCase       Constant. Tranform string into lowercase. */
    const VnLowerCase                = 1;

    /** @const int VnUpperCase       Constant. Tranform string into uppercase. */
    const VnUpperCase                = 2;

    /** -------------------- Constant for string triming -------------------- */
    /** @const int VnTrimN           Constant. Number of type for trim the string. */
    const VnTrimN                    = 6;

    /** @const int VnTrimNormal      Constant. Trim string and skip normal order. */
    const VnTrimNormal               = 0;

    /** @const int VnTrimReverse     Constant. Trim string and reverse string. */
    const VnTrimReverse              = 1;

    /** @const int VnTrimFirstLast   Constant. Trim string and turn first name to begin of string. */
    const VnTrimFirstLast            = 2;

    /** @const int VnTrimFirst       Constant. Trim string and skip first name only. */
    const VnTrimFirst                = 3;

    /** @const int VnTrim2First      Constant. Trim string and skip 2 word for first name. */
    const VnTrim2First               = 4;

    /** @const int VnTrimShorthand   Constant. Trim string then use shorthand of family and sub name and full first name. */
    const VnTrimShorthand            = 5;

    /** -------------------- Variables -------------------- */
    /** @var string[] $families      Store database of families. */
	public  static $families         = [];

    /** @var string[] $males         Store database of male name. */
    public  static $males            = [];

    /** @var string[] $females       Store database of female name. */
    public  static $females          = [];

    /** @var string[] $males         Store database of mobiles. */
    public  static $mobiles          = [];

    /** @var string[] $telephones    Store database of telephones. */
    public  static $telephones       = [];

    /** @var string[] $address       Store database of address. */
	public  static $address          = [];

    /** @var string $digits          Store database of digits. */
    private static $digits 	         = "0123456789";

    /** @var string $words           Store database of words include lowercase and uppercase. */
    private static $words            = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    /** @var string $signs           Store database of signs. */
    private static $signs 	         = "`~!@#$%^&*()_+-=[]{}|\\;':\",./<>?";

    /** @var string $colors          Store database of color digit. */
    private static $colors 	         = "0123456789ABCDEF";

    /** @var string $delimiters      Store database of delimiters. */
    public  static $delimiters       = ".-_";

    /** @var string[] $emails        Store database of email services. */
    public  static $emails           = ["gmail.com", "gmail.com.vn", "yahoo.com", "yahoo.com.vn", "ymail.com", "hotmail.com", "outlook.com"];

    /** @var string[] $dateFormats   Store database of date formats. */
    public  static $dateFormats      = ["Y", "Ymd", "dmY", "dm", "y", "ymd", "dmy"];

    /** -------------------- Methods -------------------- */
    /**
      * @method        LoadVnData          Load data form database file.
      * @param  string $data               Type of data.
      * @return void
      */
    public static function LoadVnData($data) {
        $arr = null;
        switch ($data) {
            case 'Family'	: $arr = &VnBase::$families;   break;
            case 'Male'  	: $arr = &VnBase::$males;      break;
            case 'Female'	: $arr = &VnBase::$females;    break;
            case 'Mobile'   : $arr = &VnBase::$mobiles;    break;
            case 'Telephone': $arr = &VnBase::$telephones; break;
            case 'Address'  : $arr = &VnBase::$address; $data = "CanThoAddress"; break;
        }

        if(empty($arr)) {
            $dataSource = realpath(dirname(__FILE__))."\Vn".$data.".txt";
            $myfile = fopen($dataSource, "r") or die("Unable to open data source file \"$dataSource\"!");
            while(!feof($myfile)) {
                $line = fgets($myfile);
                $part = explode("\t", $line);

                $isGoodData = false;
                if (count($part) > 1) {
                	$isGoodData = $part[0] != "" && $part[1] != "";
                }
                switch ($data) {
                	case "Family":
	                    if($isGoodData) {
	                        array_push($arr, ["family" => trim($part[1]), "probability" => (int)$part[0]]);
	                    }
                		break;
                	case "Mobile":
                    	if($isGoodData) {
							array_push($arr, ["mobile" => trim($part[0]), "probability" => (int)$part[1]]);
                    	}
                		break;
                	case "Telephone":
                    	if($isGoodData) {
							array_push($arr, ["old" => (int)$part[0], "new" => (int)$part[1]]);
                    	}
                		break;
                	default:
                		array_push($arr, $line);
                		break;
                }
            }
            fclose($myfile);
        }
    }

    /**
      * @method        RandomVnData        Random value form database.
      * @param  string $data               Type of data.
      * @param  string $compareFirstName   Use for generate unique list of full name.
      * @return string                     Random value.
      */
    public static function RandomVnData($data, $compareFirstName = "") {
        $arr = null;
        switch ($data) {
            case 'Family'	: $arr = &VnBase::$families;   break;
            case 'Male'  	: $arr = &VnBase::$males;      break;
            case 'Female'	: $arr = &VnBase::$females;    break;
            case 'Mobile'   : $arr = &VnBase::$mobiles;    break;
            case 'Telephone': $arr = &VnBase::$telephones; break;
            case 'Email'	: $arr = &VnBase::$emails; 	   break;
            case 'Date'		: $arr = &VnBase::$dateFormats;break;
            case 'Address'  : $arr = &VnBase::$address;    break;
        }
        $nArr = count($arr);
        $result = "";
        if ($compareFirstName != "") {
            do {
                $result = $arr[rand(0, $nArr - 1)];
                $part = explode(" ", $result);
                $firstName = $part[count($part) - 1];
            } while ($compareFirstName == $firstName);
        } else {
            $result = $arr[rand(0, $nArr - 1)];
        }
        return $result;
    }

    /**
      * @method        Vn2En               Remove all Vietnamese sign and convert string into lowercase.
      * @param  string $str                Source string.
      * @return string                     Non-Vietnamse sign lowercase string.
      */
    public static function Vn2En ($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ|đ|ð',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ|Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
       }
        return $str;
    }

    /**
      * @method        RandomNumber        Random number between $from and $to value.
      * @param  int    $from               Random number from.
      * @param  int    $to                 Random number to.
      * @return int                        Random number.
      */
    public static function RandomNumber($from, $to) {
    	return rand($from, $to);
    }

    /**
      * @method        RandomString        Generate random string.
      * @param  int    $length             Length of random string.
      * @param  int    $type               Random type: VnMixed, VnNonZeroDigit, VnDigit, VnWords, VnSigns, VnSpace.
      * @param  int    $duplicateChecking  Use to generate unique list of charaters.
      * @return string                     Random string.
      */
    public static function RandomString($length, $type = VnBase::VnMixed, $duplicateChecking = VnBase::VnFalse) {
    	if ($type == VnBase::VnNonZeroDigit) {
    		$type   = 1;
    	}

    	$haveDigits =  $type       & 1;
    	$haveWords  = ($type >> 1) & 1;
    	$haveSigns  = ($type >> 2) & 1;
    	$haveSpaces = ($type >> 3) & 1;

    	$pattern    = ($haveDigits? VnBase::$digits: "").($haveWords? VnBase::$words: "").($haveSigns? VnBase::$signs: "").($haveSpaces? " ": "");
    	$n          = strlen($pattern);
    	$result     = "";
    	for ($i=1; $i <= $length; $i++) { 
    		$newChar = VnBase::RandomChar(VnBase::VnCustom, $pattern);
    		if ($duplicateChecking == VnBase::VnTrue) {
    			while (strpos($result, $newChar) !== false) {
    				$newChar = VnBase::RandomChar(VnBase::VnCustom, $pattern);
    			}
    		}
    		$result .= $newChar;
    	}
    	if ($type == VnBase::VnNonZeroDigit && $result[0] = '0') {
    		$result[0] = VnBase::RandomNumber(1, 9);
    	}
    	return $result;
    }

    /**
      * @method        RandomChar          Generate random character.
      * @param  int    $type               Random type: VnMixed, VnNonZeroDigit, VnDigit, VnWords, VnSigns, VnSpace, VnCustom.
      * @param  string $pattern            Source characters use for VnCustom mode.
      * @param  int    $isNullable         Allow generating null character.
      * @return char                       Random character.
      */
    public static function RandomChar($type = VnBase::VnMixed, $pattern = "", $isNullable = VnBase::VnFalse) {
    	if ($type == VnBase::VnNonZeroDigit) {
    		$pattern = "123456789";
    	} else if ($type != VnBase::VnCustom) {
    		$haveDigits =  $type       & 1;
	    	$haveWords  = ($type >> 1) & 1;
	    	$haveSigns  = ($type >> 2) & 1;
	    	$haveSpaces = ($type >> 3) & 1;

	    	$pattern    = ($haveDigits? VnBase::$digits: "").($haveWords? VnBase::$words: "").($haveSigns? VnBase::$signs: "").($haveSpaces? " ": "");
    	}

		if ($pattern == "") {
    		return "";
    	} else {
    		$patternLength  = strlen($pattern);

    		$index = VnBase::RandomNumber(0, $patternLength - 1 + $isNullable);
    		return $index == $patternLength? "": $pattern[$index];
    	}
    }

    /**
      * @method        ShuffleString       Shuffle source string.
      * @param  string $source             Source string.
      * @return string                     Shuffled string.
      */
    public static function ShuffleString($source) {
		$str    = $source;
		$length = strlen($str);
    	for ($i=0; $i <= $length-1; $i++) { 
			$index       = VnBase::RandomNumber(0, $length - 1);
			$tmp         = $str[$i];
			$str[$i]     = $str[$index];
			$str[$index] = $tmp;
        }
        return $str;
    }
}