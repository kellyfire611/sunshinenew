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
  * @class VnBigNumber Big number utilities.
  */
class VnBigNumber
{
    /**
      * @method        Floor   Remove the real part of big integer number.
      * @param  string $number Decimal number.
      * @return string         Big integer number.
      */
    public static function Floor($number) {
        $number   .= "";
        $strReturn = $number;

        $pos = strpos($number, ".");
        if ($pos !== false) {
            $strReturn = substr($number, 0, $pos);
        }
        return $strReturn;
    }

    /**
      * @method        Fill    Fill leading '0' for big integer number.
      * @param  string $number Big integer number.
      * @param  string $length Display space.
      * @return string         Full leading '0' big integer number.
      */
    public static function Fill($number, $length) {
        $numberLen = strlen($number);
        $result = "";
        if ($length > $numberLen) {
            for ($i=1; $i <= $length - $numberLen ; $i++) { 
                $result = "0".$result;
            }
        }
        return $result.$number;
    }

    /**
      * @method        Trim    Remove leading '0' of big integer number.
      * @param  string $number Leading '0' big integer number.
      * @return string         Clean big integer number.
      */
    public static function Trim($number) {
        $numberLen = strlen($number);
        for ($i=0; $i < $numberLen; $i++) { 
            if ($number[$i] != "0") {
                break;
            }
        }
        if ($i < $numberLen) {
            $number = substr($number, $i);
        } else {
            $number = "0";
        }
        return $number;
    }

    /**
      * @method        Random Random big integer number between $from to $to.
      * @param  string $from  $from big integer number.
      * @param  string $to    $to big integer number.
      * @return string        Random big integer $number.
      */
    public static function Random($from, $to) {
        $fromLen = strlen($from);
        $toLen   = strlen($to);
        $maxLen  = max($fromLen, $toLen);
        $from    = VnBigNumber::Fill($from, $maxLen);
        $to      = VnBigNumber::Fill($to,   $maxLen);
        do {
            $result = VnBigNumber::Fill(VnBase::RandomString(VnBase::RandomNumber($fromLen, $toLen), VnBase::VnDigit), $maxLen);
        } while($result < $from || $to < $result);
        //echo "$from <= $result <= $to # ". ($result < $from || $to < $result). "<br/>";
        return VnBigNumber::Trim($result);
    }

    /**
      * @method        Format     Format decimal number.
      * @param  string $number    Decimal number.
      * @param  int    $fixed     Display space for real part.
      * @param  string $point     Point char.
      * @param  string $separate  Separate char.
      * @return string            Formatted decimal number.
      */
    public static function Format($number, $fixed = -1, $point = ".", $separate = ",") {
        $result = "";
        $pos = strpos($number, ".");
        $int = $number;
        $real = "";
        if ($pos !== false) {
            if ($pos == 0) {
                $int = "0";
            } else {
                $int = substr($number, 0, $pos);
            }
            if ($fixed != 0) {
                $real = substr($number, $pos + 1);
                if ($fixed != -1 && strlen($real) > $fixed) {
                    $real = substr($real, 0, $fixed);
                }
            }
        }
        for ($i = strlen($int)-1, $j=1; $i >= 0 ; $j++, $i--) { 
            $result = $int[$i].$result;
            if ($j % 3 == 0 && $i > 0) {
                $result = $separate.$result;
            }
        }
        if ($real != "") {
            $result .= $point.$real;
        }
        return $result;
    }

    /**
      * @method        ToString Convert big integer number to Vietnamese text.
      * @param  string $number  Big integer number.
      * @return string          Vietnamese text for this number.
      */
    public static function ToString($number) {
        $sNumber = VnBigNumber::Floor($number);

        // Tao mot bien tra ve
        $sReturn = "";
        
        // Tim chieu dai cua chuoi
        $iLen = strlen($sNumber);

        // Lat nguoc chuoi nay lai
        $sNumber1 = "";
        for ($i = $iLen - 1; $i >= 0; $i--) {
            $sNumber1 .= $sNumber[$i];
        }

        // Tao mot vong lap de doc so
        // Tao mot bien nho vi tri cua $sNumber
        $iRe = 0;
        $soTyTy = $iLen > 18;
        do {
            // Tao mot bien cat tam
            $sCut = "";
            if ($iLen > 3) {
                $sCut = substr($sNumber1, $iRe * 3, 3);
                $sReturn = VnBigNumber::Read($sCut, $iRe, $soTyTy) . $sReturn;
                $iRe++;
                $iLen -= 3;
            } else {
                $sCut = substr($sNumber1, $iRe * 3, $iLen);
                $sReturn = VnBigNumber::Read($sCut, $iRe, $soTyTy) . $sReturn;
                break;
            }
        } while (true);
        $sReturnLen = strlen($sReturn);
        if($sReturnLen == 0){
            $sReturn .= "không ";
        }
        $sReturn = strtoupper(substr($sReturn, 0, 1)).substr($sReturn, 1);
        return $sReturn;
    }

    // Khoi tao ham Read
    private static function Read($sNumber, $iPo, $soTyTy) {
        // Tao mot bien tra ve
        $sReturn  = "";

        // Tao mot bien so
        $sPo    = [ "", "ngàn ", "triệu ", "tỷ ", "ngàn ", "triệu ", "tỷ tỷ ", "ngàn ", "triệu " ];
        $sSo    = [ "không ", "một ", "hai ", "ba ", "bốn ", "năm ", "sáu ", "bảy ", "tám ", "chín " ];
        $sDonvi = [ "", "mươi ", "trăm " ];

        // Tim chieu dai cua chuoi
        $iLen = strlen($sNumber);

        // Tao mot bien nho vi tri doc
        $iRe = 0;

        // Tao mot vong lap de doc so
        for ($i = 0; $i < $iLen; $i++) {
            $iTemp = $sNumber[$i];

            // Tao mot bien ket qua
            $sRead = "";

            // Kiem tra xem so nhan vao co = 0 hay ko
            if ($iTemp == 0) {
                switch ($iRe) {
                    case 0:
                        break;// Khong lam gi ca
                    case 1: 
                        if ($sNumber[0] != 0) {
                            $sRead = "lẻ ";
                        }
                        break;
                    case 2: 
                        if ($sNumber[0] != 0 && $sNumber[1] != 0) {
                            $sRead = "không trăm ";
                        }
                        break;
                }
            } else if ($iTemp == 1) {
                switch ($iRe) {
                    case 1:
                        $sRead = "mười ";
                        break;
                    default:
                        if($i == 0) {
                            $sRead = $iLen > 1 && $sNumber[1] != 1? "mốt ": "một ";
                        } else {        
                            $sRead = "một " . $sDonvi[$iRe];
                        }
                        break;
                }
            } else if ($iTemp == 5) {
                switch ($iRe) {
                    case 0: 
                        if(strlen($sNumber) <= 1){
                            $sRead = "năm ";
                        } else if ($sNumber[1] != 0) {
                            $sRead = "lăm ";
                        } else {
                            $sRead = "năm ";
                        }
                        break;
                    default:
                        $sRead = $sSo[$iTemp] . $sDonvi[$iRe];
                }
            } else {
                $sRead = $sSo[$iTemp] . $sDonvi[$iRe];
            }

            $sReturn = $sRead . $sReturn;
            $iRe++;
        }
        if (strlen($sReturn) > 0) {
            $sReturn .= $sPo[$iPo];
        } else if ($iPo == 3 && !$soTyTy) {
            $sReturn .= $sPo[$iPo];
        } else if ($iPo == 6 && $soTyTy) {
            $sReturn .= $sPo[$iPo];
        }

        return $sReturn;
    }
}