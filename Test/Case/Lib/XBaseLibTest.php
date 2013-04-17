<?php

App::uses('XBaseLib', 'Math.Lib');

/**
 * testing
 * 2009-07-15 ms
 */
class XBaseLibTest extends CakeTestCase {
	public $XBase = null;

	public function setUp() {
		//$this->XBase = new XBaseLib();
	}


	/** Start **/

	public function testX() {
		echo "<h4> Some Examples, object-data shown using var_dump</h4>";
		echo "Decimal 65535:<br>";
		$a = new XBaseLib(65535, 10);
		var_dump($a);

		// change base and use lower letters
		$a->toLower();
		$a->setBase(16);
		echo "<b>changed to lower letters and changed the base to hex</b>";
		var_dump($a);

		// change number and Base
		echo "<b>changed the number to binary 10101010 </b>";
		$a->setNum(10101010, 2);
		$a->toLower();
		var_dump($a);

		$a->setNum('fffe', 16);
		echo "<b>now Hex fffe converted to all number-systems(bases)</b>";
		var_dump($a);
		for ($i = 2; $i <= $a->getMaxBase(); $i++) {
			echo "<br><b>Base " . $i . "</b>   " . $a->getConvNum($i);
		}

		echo "<br><br>And finally an example using the mixed set of digits in contrast to lower or upper case letters</b>";
		echo "<br><b>see the decimal value of  Hex fffe</b>";
		$a->setNum('fffe', 16);
		echo "<br><br>with lower digits: <br>" . $a->getDec();
		var_dump($a);
		$a->mixedDigits();
		$a->setNum('fffe', 16);
		echo "<br><br>and after setting the digit-set to mixed digits: <br>" . $a->getDec();
		var_dump($a);
	}


	/** End **/

}


