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

use Illuminate\PhpVnDataGenerator\VnBase;

/**
  * @class VnFullname Generate random human name.
  */
class VnFullname
{
    /**
      * @method          Family              Generate random family.
      * @return string                       Random family.
      */
    public function Family() {
        VnBase::LoadVnData("Family");

        $probability = VnBase::RandomNumber(0, 1000);
        $arr = &VnBase::$families;
        if($probability <= $arr[0]["probability"]) {
            return $arr[0]["family"];
        } else {
            $n = count($arr);
            for ($i=1; $i < $n; $i++) {
                if ($arr[$i-1]["probability"] < $probability && $probability <= $arr[$i]["probability"]) {
                    return VnBase::$families[$i]["family"];
                }
            }
        }
    }

    /**
      * @method          IsFamilyExist       Check a string is a family.
      * @param  string   $family             Source string.
      * @return bool                         Check result.
      */
    public function IsFamilyExist($family) {
        VnBase::LoadVnData("Family");
        for ($i = 0; $i < count(VnBase::$families)-1; $i++) {
            if(VnBase::$families[$i]["family"] == $family) {
                return true;
            }
        }
        return false;
    }

    /**
      * @method          FullName            Generate random person name by gender.
      * @param  int      $gender             Gender: VnMixed, VnMale, VnFemale.
      * @param  string   $family             Family of this person.
      * @param  string   $compareFirstName   Use for generate unique list of person name.
      * @return string                       Random full name.
      */
    public function FullName($gender, $family = "", $compareFirstName = "") {
        if ($gender == VnBase::VnMixed) {
            $gender = VnBase::RandomNumber(0, 1000) > 450? VnBase::VnMale: VnBase::VnFemale;
        }
        $genderData = $gender? "Male": "Female";

        $haveMotherFamily = 0;
        if ($family == "") {
            $family = $this->Family();

            $motherFamily = "";
            $haveMotherFamily = VnBase::RandomNumber(0, 1000);
            if ($haveMotherFamily > 750) {
                do {
                    $motherFamily = $this->Family();
                } while ($motherFamily == $family);
                $family = "$family $motherFamily";
            }
        }

        VnBase::LoadVnData($genderData);
        $firstName = VnBase::RandomVnData($genderData);
        $part      = explode(" ", $firstName);
        $fName     = trim($part[count($part) - 1]);
        if ($compareFirstName != "") {
            while($compareFirstName == $fName) {
                $firstName = VnBase::RandomVnData($genderData);
                $part      = explode(" ", $firstName);
                $fName     = trim($part[count($part) - 1]);
            }
        }

        $haveOnlyFirstname = VnBase::RandomNumber(0, 1000);
        if($gender == VnBase::VnMale &&
          (($haveMotherFamily >  750 && $haveOnlyFirstname > 700) || 
           ($haveMotherFamily <= 750 && $haveOnlyFirstname > 850))) {
            $firstName = $fName;
        }

        return "$family $firstName";
    }

    /**
      * @method          Extract             Extract full name into special parts.
      * @param  string   $family             Family of this person.
      * @param  int      $info               Which part will be extract: VnFull, VnSubName, VnFamily, VnMotherFamily, VnFirstName, VnThi, VnVan
      * @return string[]                     Full name special parts.
      */
    public function Extract($fullname, $info = VnBase::VnFull) {
        $part = explode(" ", $fullname);
        $nPart = count($part);

        $family = trim($part[0]);
        if ($info == VnBase::VnFamily) {
            return ["n"=>$nPart, "family"=>$family];
        }

        if ($nPart >= 2) {
            $firstName = trim($part[$nPart - 1]);
            if ($info == VnBase::VnFirstName) {
                return ["n"=>$nPart, "family"=>$family, "firstName"=>$firstName];
            }

            if ($nPart >= 3) {
                $motherFamily = trim($part[1]);
                if (!$this->IsFamilyExist($motherFamily)) {
                    $motherFamily = "";
                }
                if ($info == VnBase::VnMotherFamily) {
                    return ["n"=>$nPart, "family"=>$family, "motherFamily"=>$motherFamily, "firstName"=>$firstName];
                }

                $Thi = "";
                $thiIndex = $motherFamily==""? 1: 2;
                if ($part[$thiIndex] == "Thị") {
                    $Thi = "Thị";
                }
                if ($info == VnBase::VnThi) {
                    return ["n"=>$nPart, "family"=>$family, "motherFamily"=>$motherFamily, "thi"=>$Thi, "firstName"=>$firstName];
                }

                $Van = "";
                if ($part[$nPart - 2] == "Văn") {
                    $Van = "Văn";
                }
                if ($info == VnBase::VnVan) {
                    return ["n"=>$nPart, "family"=>$family, "motherFamily"=>$motherFamily, "thi"=>$Thi, "van"=>$Van, "firstName"=>$firstName];
                }

                $start  = 1 + ($motherFamily==""? 0: 1) + ($Thi==""? 0: 1);
                $end    = $nPart - 2 - ($Van==""? 0: 1);
                $subName= $start<=$end? trim($part[$start]): "";
                for ($i = $start + 1; $i < $end; $i++) { 
                    $subName = $subName." ".trim($part[$i]);
                }
                return ["n"=>$nPart, "family"=>$family, "motherFamily"=>$motherFamily, "thi"=>$Thi, "subName"=>$subName, "van"=>$Van, "firstName"=>$firstName];
            } else {
                return ["n"=>$nPart, "family"=>$family, "motherFamily"=>"", "thi"=>"", "subName"=>"", "van"=>"", "firstName"=>$firstName];
            }
        } else {
            return ["n"=>$nPart, "family"=>$family, "motherFamily"=>"", "thi"=>"", "subName"=>"", "van"=>"", "firstName"=>""];
        }
    }

    /**
      * @method          FullNames           Generate list of random full name.
      * @param  int      $gender             Gender: VnMixed, VnMale, VnFemale.
      * @param  int      $length             Length of list or random full name.
      * @param  int      $duplicateVnUnsign  Check duplicate list value using non-Vietnamse sign lowercase string.
      * @param  int      $duplicateChecking  Check duplicate list value.
      * @return string[]                     List of random full name.
      */
    public function FullNames($gender, $length, $duplicateVnUnsign = VnBase::VnTrue, $duplicateChecking = VnBase::VnTrue) {
        VnBase::LoadVnData("Family");
        if ($gender == VnBase::VnMixed) {
            VnBase::LoadVnData("Male");
            VnBase::LoadVnData("Female");
        } else {
            VnBase::LoadVnData($gender? "Male": "Female");
        }

        $familiesLength = count(VnBase::$families);
        $namesLength    = 1;
        if ($gender == VnBase::VnMixed) {
            $malesLength   = count(VnBase::$males);
            $femalesLength = count(VnBase::$females);
            $namesLength   = $malesLength + $femalesLength;
        } else {
            $namesLength   = count($gender? VnBase::$males: VnBase::$females);
        }
        $maxLength = $familiesLength * $namesLength;

        if ($length <= $maxLength) {
            if ($gender == VnBase::VnMixed && $length > 5000) {
                echo "VnBase::VnMixed error: You can generated less than 5001 mixed name only!";
                return null;
            } else {
                $start = 0;
                $step  = 1;

                $list         = [];
                $unsignedList = [];

                $index        = VnBase::RandomNumber(2, max(2, (int)(($maxLength - $length) / 100))) - 2;
                $step         = VnBase::RandomNumber(1, (int)(($maxLength -  $index) / $length));
                $index       -= $step;
                //echo "step: $step - index: ".($index + $step)." - length: $length - count: $maxLength<br/>";
                $isMale = true;
                for ($i=0; $i < $length; $i++) {
                    $fullName = "";
                    $fullNameUnsigned = "";
                    do {
                        $existed = false;
                        if ($length <= 5000) {
                            $fullName = $this->FullName($gender);

                            if ($duplicateVnUnsign == VnBase::VnTrue) {
                                $fullNameUnsigned = VnBase::Vn2En($fullName);
                                $existed = array_search($fullNameUnsigned, $unsignedList) !== false;
                            } else if($duplicateChecking == VnBase::VnTrue) {
                                $existed = array_search($fullName, $list) !== false;
                            }
                        } else if ($gender != VnBase::VnMixed) {
                            $index         += $step;

                            $families_index = floor($index / $namesLength);
                            $names_index    = $index % $namesLength;
                            $fullName       = VnBase::$families[$families_index]["family"]." ".($gender? VnBase::$males[$names_index]: VnBase::$females[$names_index]);

                            $fullNameUnsigned = VnBase::Vn2En($fullName);

                            if ($i > 0) {
                                if ($duplicateVnUnsign == VnBase::VnTrue) {
                                    $existed = $fullNameUnsigned == $unsignedList[$i - 1];
                                } else if($duplicateChecking == VnBase::VnTrue) {
                                    $existed = $fullName == $list[$i - 1];
                                }
                            }
                        }
                    } while($existed);

                    array_push($list, $fullName);
                    if($duplicateVnUnsign) {
                        array_push($unsignedList, $fullNameUnsigned);
                    }
                }
                return $list;
            }
        } else {
            echo "VnFullname::Males error: length is too long!";
            return null;
        }
    }

    /**
      * @method          Father              Generate father name from a child name.
      * @param  string   $childName          Child name.
      * @param  int      $childGender        Gender of child: VnMixed, VnMale, VnFemale.
      * @param  int      $generateNameOnly   If $generateNameOnly is VnTrue, father and child have the same name but difference first name only.
      * @return string                       Father name.
      */
    public function Father($childName, $childGender, $generateNameOnly = VnBase::VnMixed) {
		if($childGender != VnBase::VnMale) {
			$generateNameOnly = VnBase::VnFalse;
		}

		$isGenerateNameOnly = $generateNameOnly == VnBase::VnTrue;
		if($generateNameOnly == VnBase::VnMixed) {
			$generateNameOnly = VnBase::RandomNumber(0, 1000) > 600? VnBase::VnTrue: VnBase::VnFalse;
		}
        $childFullname = $this->Extract($childName);

        $family = $childFullname["family"];
        $nPart = $childFullname["n"];

		if($generateNameOnly == VnBase::VnTrue) {
			VnBase::LoadVnData("Family");
			$haveMotherFamily = false;
			if($nPart > 3) {
                $haveMotherFamily = $childFullname["motherFamily"] != "";
			}

			$deleteVan = false;
            if(!$isGenerateNameOnly && $childFullname["van"] != "") {
				$deleteVan = VnBase::RandomNumber(0, 1000) > 750;
			}
            $family = $family." ".$childFullname["subName"];
            if(!$deleteVan && $childFullname["van"] != "") {
                $family = $family." Văn";
            }

            $canTheSameFirstName = VnBase::RandomNumber(0, 1000) > 950;
            $name       = VnBase::RandomVnData("Male", $canTheSameFirstName? "": $childFullname["firstName"]);
			
			if($deleteVan) {
				return "$family $name";
			} else {
				$firstName = $this->Extract($name, VnBase::VnFirstName)["firstName"];
				return "$family $firstName";
			}
		} else {
            $canTheSameFirstName = VnBase::RandomNumber(0, 1000) > 950;
            $father     = $this->FullName(VnBase::VnMale, $family, $canTheSameFirstName? "": $childFullname["firstName"]);
			return $father;
		}
    }

    /**
      * @method          Mother              Generate mother name from a child name.
      * @param  string   $childName          Child name.
      * @return string                       Mother name.
      */
	public function Mother($childName) {
        $childFullname = $this->Extract($childName);
		$nPart = $childFullname["n"];

        $motherFamily = $childFullname["motherFamily"];
		$haveMotherFamily = $motherFamily != "";
		//echo "childName: \"$childName\" - motherFamily: \"$motherFamily\" - haveMotherFamily: ".($haveMotherFamily?1:0)." <br/>";

		if (!$haveMotherFamily || ($haveMotherFamily && $nPart==3 && VnBase::RandomNumber(0, 1000)<800))
			$motherFamily = "";
        
        $canTheSameFirstName = VnBase::RandomNumber(0, 1000) > 950;
        $mother = $this->FullName(VnBase::VnFemale, $motherFamily, $canTheSameFirstName? "": $childFullname["firstName"]);
        return $mother;
    }

    /**
      * @method          Parents             Generate parent name from a child name.
      * @param  string   $childName          Child name.
      * @param  int      $childGender        Gender of child: VnMixed, VnMale, VnFemale.
      * @param  int      $generateNameOnly   If $generateNameOnly is VnTrue, father and child have the same name but difference first name only.
      * @return string                       Parent name.
      */
    public function Parents($childName, $childGender, $generateNameOnly = VnBase::VnMixed) {
        if (VnBase::RandomNumber(0, 1000) > 500) {
            return $this->Father($childName, $childGender, $generateNameOnly);
        } else {
            return $this->Mother($childName);
        }
    }

    /**
      * @method          Children            Generate child name from a father and mother name.
      * @param  int      $gender             Gender of child: VnMixed, VnMale, VnFemale.
      * @param  string   $father             Father name.
      * @param  string   $mother             Mother name.
      * @param  int      $generateNameOnly   If $generateNameOnly is VnTrue, child and parent have the same name but difference first name only.
      * @return string                       Child name.
      */
    public function Children($gender, $father, $mother = "", $generateNameOnly = VnBase::VnMixed) {
        if ($gender == VnBase::VnMixed) {
            $gender = VnBase::RandomNumber(0, 1000) > 500? VnBase::VnMale: VnBase::VnFemale;
        }
        $genderData = $gender? "Male": "Female";

        if (($gender==VnBase::VnMale && $father=="") || ($gender==VnBase::VnFemale && $mother=="")) {
            $generateNameOnly = VnBase::VnFalse;
        } else if($generateNameOnly == VnBase::VnMixed) {
            $generateNameOnly = VnBase::RandomNumber(0, 1000) > 600? VnBase::VnTrue: VnBase::VnFalse;
        }
        $isGenerateNameOnly = $generateNameOnly == VnBase::VnTrue;

        if ($father != "" || $mother != "") {
            $fatherName = null;
            $motherName = null;

            if ($father != "") {
                $fatherName = $this->Extract($father);
            }
            if ($mother != "") {
                $motherName = $this->Extract($mother);
            }

            $family = "";
            if ($father == "") {
                $family = $motherName["family"];
            } else if ($mother == "") {
                $family = $fatherName["family"];
            } else {
                $family = $fatherName["family"];
                if ($fatherName["family"] != $motherName["family"]) {
                    $haveMotherFamily = VnBase::RandomNumber(0, 1000);
                    if (($gender == VnBase::VnMale   && $haveMotherFamily > 750) || 
                        ($gender == VnBase::VnFemale && (
                            ($isGenerateNameOnly  && $haveMotherFamily > 900) ||
                            (!$isGenerateNameOnly && $haveMotherFamily > 750)
                        ))) {
                        $family = "$family ".$motherName["family"];
                    }
                }
            }

            VnBase::LoadVnData($genderData);
            $canTheSameFirstName = VnBase::RandomNumber(0, 1000) > 950;
            $firstName = VnBase::RandomVnData($genderData);
            $part = explode(" ", $firstName);
            $fName = $part[count($part) - 1];
            if (!$canTheSameFirstName) {
                $fatherFName = $father == ""? "": $fatherName["firstName"];
                $motherFName = $mother == ""? "": $motherName["firstName"];
                while ($fName == $fatherFName || $fName == $motherFName) {
                    $firstName = VnBase::RandomVnData($genderData);
                    $part = explode(" ", $firstName);
                    $fName = $part[count($part) - 1];
                }
            }

            if ($isGenerateNameOnly) {
                $haveThiOrVan = VnBase::RandomNumber(0, 1000) > 500;
                if ($gender == VnBase::VnMale) {
                    return $family." ".$fatherName["subName"].($haveThiOrVan && $fatherName["van"]!=""? " Văn": "")." $fName";
                } else {
                    return $family.($haveThiOrVan && $motherName["thi"]!=""? " Thị": "")." ".$motherName["subName"]." $fName";
                }
            } else {
                return "$family $firstName";
            }
        } else {
            echo "VnFullname::ChildName error: Both father name and mother name are empty!";
        }
    }

    /**
      * @method          Vn2En               Remove all Vietnamese sign and convert string into other case.
      * @param  string   $str                Source string.
      * @param  int      $case               String case: VnCapitalize, VnLowercase, VnUppercase.
      * @return string                       Result string.
      */
    private function Vn2En($str, $case = VnBase::VnCapitalize) {
        $str = trim(VnBase::Vn2En(mb_strtolower($str)));
        switch ($case) {
            case VnBase::VnCapitalize:
                $length  = strlen($str);
            
                $first   = strtoupper($str[0]);
                $release = substr($str, 1, $length - 1);

                return "$first$release";
            
            case VnBase::VnLowerCase:
                return $str;
            
            case VnBase::VnUpperCase:
                return strtoupper($str);
        }
    }

    /**
      * @method          Shorthand           Remove all Vietnamese sign and convert string into other case.
      * @param  string   $fullname           Source string.
      * @param  int      $case               String case: VnCapitalize, VnLowercase, VnUppercase.
      * @param  int      $trimType           String type: VnTrimNormal, VnTrimReverse, VnTrimFirstLast, VnTrimFirst, VnTrim2First, VnTrimShorthand.
      * @param  string   $delimiter          Delimiter pattern, result string will don't have delimiter if $delimiter is empty.
      * @param  int      $delimiterNullable  Allow empty delimiter.
      * @return string                       Result string.
      */
    public function Shorthand($fullname, $case = VnBase::VnCapitalize, $trimType = VnBase::VnTrimNormal, $delimiter = "", $delimiterNullable = VnBase::VnTrue) {
        $part   = explode(" ", $fullname);
        $nPart  = count($part);
        $result = "";

        if ($case == VnBase::VnMixed) {
            $case = VnBase::RandomNumber(0, VnBase::VnCaseN - 1);
        }

        if ($trimType == VnBase::VnMixed) {
            $trimType = VnBase::RandomNumber(0, VnBase::VnTrimN - 1);
        }

        switch ($trimType) {
            case VnBase::VnTrimShorthand:
                for ($i = 0; $i < $nPart-1; $i++) {
                    $result .= $this->Vn2En(mb_substr($part[$i], 0, 1), $case).VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                }
                $result .= $this->Vn2En($part[$nPart - 1], $case).VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                break;
            case VnBase::VnTrimNormal:
                for ($i = 0; $i <= $nPart-1; $i++) {
                    $result .= $this->Vn2En($part[$i], $case).VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                }
                break;
            case VnBase::VnTrimReverse:
                for ($i = $nPart-1; $i >= 0 ; $i--) {
                    $result .= $this->Vn2En($part[$i], $case).VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                }
                break;
            case VnBase::VnTrimFirstLast:
                $result .= $this->Vn2En($part[$nPart - 1], $case).VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                for ($i = 0; $i <= $nPart-2; $i++) {
                    $result .= $this->Vn2En($part[$i], $case).VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                }
                break;
            case VnBase::VnTrimFirst:
                $result = $this->Vn2En($part[$nPart - 1], $case).VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                break;
            case VnBase::VnTrim2First:
                $result = $this->Vn2En($part[$nPart - 2].VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable).
                                       $part[$nPart - 1].VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable), $case);
                break;
        }
        return $result;
    }
}