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
  * @class VnTest Test library features.
  */
class VnTest
{
	/*
	public function Test() {
		$o = new VnFullname();
		$p = new VnPersonalInfo();

		echo "<h3>Random name:</h3><ul>";
		$name     = $o->FullName(VnBase::VnMale);
		$birthdate= $p->Birthdate();
		$email    = $p->Email($name, $birthdate, "", ".-_", "Ymd", VnBase::VnLowerCase, VnBase::VnTrimNormal);
		$phone    = $p->Phone();
		$father   = $o->Father($name, VnBase::VnMale, VnBase::VnTrue);
		$mother   = $o->Mother($name);
		$parents  = $o->Parents($name, VnBase::VnMale, VnBase::VnTrue);
		$son      = $o->Children(VnBase::VnMale  , $name);
		$daughter = $o->Children(VnBase::VnFemale, $name);
		$address  = $p->Address();
		echo "<li>Male: $name (".$birthdate["birthdate"]." - $email - $phone) - son: $son - daughter: $daughter"; 
		echo "<ul><li>Address: $address</li><li>Father: $father</li><li>Mother: $mother</li><li>Parents: $parents</li></ul></li>";

		$name     = $o->FullName(VnBase::VnFemale);
		$birthdate= $p->Birthdate();
		$email    = $p->Email($name, $birthdate, "", "", "Y", VnBase::VnCapitalize, VnBase::VnTrimFirstLast);
		$phone    = $p->Phone();
		$father   = $o->Father($name, VnBase::VnFemale);
		$mother   = $o->Mother($name);
		$parents  = $o->Parents($name, VnBase::VnFemale);
		$son      = $o->Children(VnBase::VnMale  , "", $name);
		$daughter = $o->Children(VnBase::VnFemale, "", $name);
		$address  = $p->Address();
		echo "<li>Female: $name (".$birthdate["birthdate"]." - $email - $phone) - son: $son - daughter: $daughter"; 
		echo "<ul><li>Address: $address</li><li>Father: $father</li><li>Mother: $mother</li><li>Parents: $parents</li></ul></li>";
		
		//$name = $o->FullName(VnBase::VnMixed);
		$gender   = rand(0, 1000) > 450? VnBase::VnMale: VnBase::VnFemale;
		$name     = $o->FullName($gender);
		$birthdate= $p->Birthdate();
		$email    = $p->Email($name, $birthdate["birthdate"], "", "?", "", VnBase::VnMixed, VnBase::VnMixed, VnBase::VnTrue);
		$phone    = $p->Phone();
		$father   = $o->Father($name, VnBase::VnMixed);
		$mother   = $o->Mother($name);
		$parents  = $o->Parents($name, VnBase::VnMixed);
		$address  = $p->Address();
		if ($gender == VnBase::VnMale) {
			$wife     = $o->FullName(VnBase::VnFemale);
			$son      = $o->Children(VnBase::VnMale  , $name, $wife);
			$daughter = $o->Children(VnBase::VnFemale, $name, $wife);
			echo "<li>Mixed: $name (".$birthdate["birthdate"]." - $email - $phone) - wife: $wife - son: $son - daughter: $daughter"; 
			echo "<ul><li>Address: $address</li><li>Father: $father</li><li>Mother: $mother</li><li>Parents: $parents</li></ul></li>";
		} else {
			$husband  = $o->FullName(VnBase::VnMale);
			$son      = $o->Children(VnBase::VnMale  , $husband, $name);
			$daughter = $o->Children(VnBase::VnFemale, $husband, $name);
			echo "<li>Mixed: $name (".$birthdate["birthdate"]." - $email - $phone) - husband: $husband - son: $son - daughter: $daughter"; 
			echo "<ul><li>Address: $address</li><li>Father: $father</li><li>Mother: $mother</li><li>Parents: $parents</li></ul></li>";
		}

		$randomLength = 10;
		echo "<hr/><h3>Random $randomLength mixed names:</h3>";
		$a = $o->FullNames(VnBase::VnMixed, $randomLength);
		            
		$this->testUniqueList($a, VnBase::VnNotSorting);

		echo "<br/><b>generated names</b><br/>";
		foreach ($a as $i => $name) {
			echo ($i+1).". $name<br/>";
		}
	}
	*/
	/**
      * @method          testUniqueList  Check unique list.
      * @param  string   $a              An array.
      * @param  string   $isSort         Is array sored: VnSorting, VnNonSorting.
      * @return void                       
      */
    public function testUniqueList(&$a, $isSort = VnBase::VnSorting) {
        if ($isSort) {
            sort($a, SORT_STRING);
        }

        $n = count($a);
        $duplicates = [];
        for ($i=0; $i <= $n-2 ; $i++) { 
            if ($a[$i] == $a[$i+1] ||
                VnBase::Vn2En($a[$i]) == VnBase::Vn2En($a[$i+1])) {
                array_push($duplicates, ["index"=>$i, "name"=>$a[$i]." - ".$a[$i+1]]);
            }
        }
        if (count($duplicates) == 0) {
            echo "<b>don't have duplicate name</b>";
        } else {
            echo "<b>duplicate names</b><br/>";
            foreach ($duplicates as $i => $value) {
                echo ($i+1).". ".$value['index']." and ".($value['index']+1)." (".$value['name'].")<br/>";
            }
        }
    }

}