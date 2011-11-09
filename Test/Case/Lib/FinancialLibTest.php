<?php

App::import('Lib', 'Math.FinancialLib');

/**
 * testing
 * 2009-07-15 ms
 */
class FinancialLibTest extends CakeTestCase {
	public $Chmod = null;

	public function startTest() {
		//$this->Fiancial = new FiancialLib();
	}


/** Start **/

	public function testArith() {
		$values = array(1, 5, 9);
		$is = FinancialLib::arithmeticMean($values);
		$this->assertEqual($is, 5);
		
		$values = array(-111.5, 5.6, 9.1, 58.1);
		$is = FinancialLib::arithmeticMean($values);
		$this->assertEqual(round($is, 3), -9.675);
	}

	
	public function testGeo() {
		$values = array(1, 5, 9);
		$is = FinancialLib::geometricMean($values);
		$this->assertEqual(round($is, 3), 6.708);
		
		$values = array(-111.5, 5.6, 9.1, 58.1);
		$is = FinancialLib::geometricMean($values);
		$this->assertEqual($is, '');	# why???	
	}
	

/** End **/

}

