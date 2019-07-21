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
use Illuminate\PhpVnDataGenerator\VnFullname;
use DateTime;

/**
  * @class VnPersonalInfo Generate random personal information.
  */
class VnPersonalInfo
{
    /**
      * @method          Telephone          Generate random Vietnamese telephone number.
      * @param  string   $telephoneHeader   Telephone header (province).
      * @param  int      $group             Have digit grop (3 digits).
      * @param  int      $format            Telephone format: VnTelephoneClean, VnTelephoneDot, VnTelephoneMinus, VnTelephoneSpace, VnTelephoneOptional.
      * @return string                      Random telephone number.
      */
    public function Telephone($telephoneHeader = "", $group = VnBase::VnTrue, $format = VnBase::VnTelephoneOptional) {
        if ($telephoneHeader == "") {
            VnBase::LoadVnData("Telephone");

            $today      = new DateTime("");
            $expireDate = new DateTime("2017-2-11");
            $type       = $today->format("Y-m-d") < $expireDate->format("Y-m-d")? "old": "new";

            $telephoneHeader = "0".VnBase::RandomVnData("Telephone")[$type];
        }

        switch ($format) {
            case VnBase::VnTelephoneDot     : $telephoneHeader .= ".";                 break;
            case VnBase::VnTelephoneMinus   : $telephoneHeader .= "-";                 break;
            case VnBase::VnTelephoneSpace   : $telephoneHeader .= " ";                 break;
            case VnBase::VnTelephoneOptional: $telephoneHeader  = "($telephoneHeader";break;
        }
        $telephone = $telephoneHeader."3)";
        for ($i=2; $i <= 6 ; $i++) {
            if($group == VnBase::VnTrue && ($i==2 || $i==5)) {
                $telephone .= " ";
            }
            $telephone .= VnBase::RandomNumber(0, 9);
        }
        //return "tel $type ".$telephone;
        return $telephone;
    }

    /**
      * @method          MobileHeader       Generate random mobile header.
      * @return string                      Random mobile header (mobile service).
      */
    public function MobileHeader() {
        VnBase::LoadVnData("Mobile");

        $probability = VnBase::RandomNumber(0, 100000);
        $arr = &VnBase::$mobiles;
        if($probability <= $arr[0]["probability"]) {
            return $arr[0]["mobile"];
        } else {
            $n = count($arr);
            for ($i=1; $i < $n; $i++) {
                if ($arr[$i-1]["probability"] < $probability && $probability <= $arr[$i]["probability"]) {
                    return $arr[$i]["mobile"];
                }
            }
        }
    }

    /**
      * @method          Mobile             Generate random Vietnamese mobile number.
      * @param  string   $mobileHeader      Mobile header (mobile service).
      * @param  int      $group             Have digit grop (3 digits).
      * @return string                      Random mobile number.
      */
    public function Mobile($mobileHeader = "", $group = VnBase::VnTrue) {
        if ($mobileHeader == "") {
            $mobileHeader = "0".$this->MobileHeader();
        }

        $mobile = $mobileHeader;
        for ($i=1; $i <= 7 ; $i++) {
            if($group == VnBase::VnTrue && ($i==2 || $i==5)) {
                $mobile .= " ";
            }
            $mobile .= VnBase::RandomNumber(0, 9);
        }
        //return "mob ".$mobile;
        return $mobile;
    }

    /**
      * @method          Phone              Generate random Vietnamese mobile number.
      * @param  int      $type              Phone type: VnMixed, VnTelephone, VnMobile.
      * @param  string   $header            Phone header.
      * @param  int      $group             Have digit grop (3 digits).
      * @param  int      $format            Telephone format: VnTelephoneClean, VnTelephoneDot, VnTelephoneMinus, VnTelephoneSpace, VnTelephoneOptional.
      * @return string                      Random phone number.
      */
    public function Phone($type = VnBase::VnMixed, $header = "", $group = VnBase::VnTrue, $format = VnBase::VnTelephoneOptional) {
        if ($type == VnBase::VnMixed) {
            $type = VnBase::RandomNumber(0, 1000) > 400 ? VnBase::VnMobile: VnBase::VnTelephone;
        }
        return $type == VnBase::VnMobile? $this->Mobile($header, $group): $this->Telephone($header, $group, $format);
    }

    /**
      * @method          IdCardNumber       Generate random Vietnamese Id card number.
      * @return string                      Random Id card number.
      */
    public function IdCardNumber() {
        return VnBase::RandomString(9, VnBase::VnDigit);
    }


    /**
      * @method          Username           Generate random username.
      * @param  string   $FullName          Full name.
      * @param  object   $birthdate         Birth date.
      * @param  string   $delimiter         Delimiter pattern.
      * @param  string   $dateFormat        Date format.
      * @param  int      $case              String case: VnCapitalize, VnLowercase, VnUppercase.
      * @param  int      $trimType          String type: VnTrimNormal, VnTrimReverse, VnTrimFirstLast, VnTrimFirst, VnTrim2First, VnTrimShorthand.
      * @param  int      $delimiterNullable Allow empty delimiter.
      * @return string                      Random username.
      */
    public function Username($FullName = "", $birthdate = "", $delimiter = "", $dateFormat = "", $case = VnBase::VnCapitalize, $trimType = VnBase::VnTrimShorthand, $delimiterNullable = VnBase::VnFalse) {
        $o = new VnFullname();
        
        if($FullName == "") {
            $FullName = $o->FullName(VnBase::VnMixed);
        }

        if ($delimiter == "?") {
            $delimiter = VnBase::ShuffleString(VnBase::$delimiters);
            $delimiterLength = VnBase::RandomNumber(0, strlen(VnBase::$delimiters));
            $delimiter = substr($delimiter, 0, $delimiterLength);
        }

        $username = $o->Shorthand($FullName, $case, $trimType, $delimiter);

        if ($birthdate == "?") {
            $dontHaveBirthdate = VnBase::RandomNumber(0, 1000) > 750;
            $birthdate = $dontHaveBirthdate? "": $this->Birthdate()["birthdate"];
        } else if (is_array($birthdate)) {
            $birthdate = $birthdate["birthdate"];
        }

        if($birthdate != "") {
            $db = new DateTime($birthdate);
            if ($dateFormat == "") {
                $dateTmp    = VnBase::RandomVnData("Date");
                if ($delimiter != "") {
                    $dateTmpLength = strlen($dateTmp);
                    $delimiter = VnBase::RandomChar(VnBase::VnCustom, $delimiter, $delimiterNullable);
                    for ($i=0; $i <= $dateTmpLength - 2; $i++) { 
                        $dateFormat .= $dateTmp[$i].$delimiter;
                    }
                    $dateFormat .= $dateTmp[$dateTmpLength - 1];
                } else {
                   $dateFormat = $dateTmp; 
                }
            }
            $birthdate = $db->format($dateFormat);
        } else if ($delimiter != "") {
            $usernameLength = strlen($username);

            if (strpos($delimiter, $username[$usernameLength - 1]) !== false) {
                $username = substr($username, 0, $usernameLength - 1);
            }
        }
        
        $username .= $birthdate;

        return $username;
    }

    /**
      * @method          Email              Generate email.
      * @param  string   $FullName          Full name.
      * @param  object   $birthdate         Birth date.
      * @param  string   $mailService       Mail services.
      * @param  string   $delimiter         Delimiter pattern.
      * @param  string   $dateFormat        Date format.
      * @param  int      $case              String case: VnCapitalize, VnLowercase, VnUppercase.
      * @param  int      $trimType          String type: VnTrimNormal, VnTrimReverse, VnTrimFirstLast, VnTrimFirst, VnTrim2First, VnTrimShorthand.
      * @param  int      $delimiterNullable Allow empty delimiter.
      * @return string                      Random username.
      */
    public function Email($FullName = "", $birthdate = "", $mailService = "", $delimiter = "", $dateFormat = "", $case = VnBase::VnCapitalize, $trimType = VnBase::VnTrimShorthand, $delimiterNullable = VnBase::VnFalse) {
        return $this->Username($FullName, $birthdate, $delimiter, $dateFormat, $case, $trimType, $delimiterNullable)."@".($mailService != ""? $mailService :VnBase::RandomVnData("Email"));
    }

    /**
      * @method          Age                Generate random age.
      * @param  int      $min               Min age.
      * @return int                         Random age.
      */
    public function Age($min = 0) {
        $probability = VnBase::RandomNumber(0, 1000);
        if($probability < 650)
            $age = VnBase::RandomNumber(18, 40);
        else if($probability < 849)
            $age = VnBase::RandomNumber(10, 17);
        else if($probability < 969)
            $age = VnBase::RandomNumber(41, 80);
        else if($probability < 989)
            $age = VnBase::RandomNumber(0, 9);
        else if($probability < 999)
            $age = VnBase::RandomNumber(81, 100);
        else
            $age = VnBase::RandomNumber(101, 120);
        if($age < $min)
            $age = 2*$min - $age;
        return $age;
    }

    /**
      * @method          BirthYear          Generate random birth year.
      * @param  int      $min               Min birth year.
      * @return int                         Random birth year.
      */
    public function BirthYear($min = 1900) {
        if($min == 1900) {
            $min = date("Y");
        }
        $age = $this->Age($this->AgeValue($min));
        return $this->BirthYearValue($age);
    }

    /**
      * @method          AgeValue           Calculate age from birthdate.
      * @param  string   $birthdate         Birthdate string.
      * @return int                         Age.
      */
    public function AgeValue($birthdate) {
        return date("Y") - date("Y", strtotime($birthdate));
    }

    /**
      * @method          BirthYearValue     Calculate birth year from age.
      * @param  int      $age               Age.
      * @return int                         Birth year.
      */
    public function BirthYearValue($age) {
        return date("Y") - $age;
    }

    /**
      * @method          Birthdate          Generate random birthdate.
      * @param  string   $year              Have exact year.
      * @param  string   $month             Have exact month.
      * @param  string   $date              Have exact date.
      * @return string[]                    Birthdate array: ["year", "month", "date", "birthdate"].
      */
    public function Birthdate($year = "", $month = "", $date = "") {
        $timestamp = VnBase::RandomNumber(1, time());
        $d = $date =="" ? date("d", $timestamp) : $date;
        $m = $month=="" ? date("m", $timestamp) : $month;
        $y = $year =="" ? date("Y", $timestamp) : $year;
        if ($m == 2 && $d == 29) {
            $d--;
        }
        return ["year"=>$y, "month"=>$m, "date"=>$d, "birthdate"=>"$y-$m-$d"];
    }

    /**
      * @method          String2Birthdate   Convert date string to date object.
      * @param  string   $date              Date string.
      * @return string[]                    Birthdate array: ["year", "month", "date", "birthdate"].
      */
    public function String2Birthdate($date = "") {
        $dt = new DateTime($date);
        $d  = $dt->format('d');
        $m  = $dt->format('m');
        $y  = $dt->format('Y');
        return ["year"=>$y, "month"=>$m, "date"=>$d, "birthdate"=>"$y-$m-$d"];
    }

    /**
      * @method          Address            Generate random address of Can Tho.
      * @return string                      Random address.
      */
    public function Address() {
        VnBase::LoadVnData("Address");

        $address = VnBase::RandomNumber(1, 400);
        $haveSub = VnBase::RandomNumber(0, 1000);
        if ($haveSub > 700) {
            $numberOfSub = 0;
            if ($haveSub < 985) {
                $numberOfSub = 1;
            } else if ($haveSub < 995) {
                $numberOfSub = 2;
            } else {
                $numberOfSub = 3;
            }

            $maxNumber     = 200;
            $charPercent   = 700;
            for ($i=1; $i <= $numberOfSub ; $i++) { 
                $maxNumber = (int)($maxNumber / $i);
                $number    = VnBase::RandomNumber(1, $maxNumber);

                $haveChar  = VnBase::RandomNumber(0, 1000);
                $char      = "";
                if ($haveChar > $charPercent) {
                    $charIndex = VnBase::RandomNumber(0, 1000);
                    if($charIndex < 450) $char = "A";
                    else if($charIndex < 650) $char = "B";
                    else if($charIndex < 800) $char = "C";
                    else if($charIndex < 900) $char = "D";
                    else if($charIndex < 950) $char = "E";
                    else if($charIndex < 975) $char = "F";
                    else if($charIndex < 995) $char = "G";
                    else $char = "H";
                }
                $charPercent = min(1000, $charPercent + (int)(2 * (1000 - $charPercent) / 3));

                $address = "$number$char/$address";
            }
        }
        $address .= " ".trim(VnBase::RandomVnData("Address")).", TP. Cần Thơ";
        return $address;
    }
}