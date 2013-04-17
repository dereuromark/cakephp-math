<?php

App::uses('FinancialLib', 'Math.Lib');

/**
 * testing
 * 2009-07-15 ms
 */
class FinancialLibTest extends CakeTestCase {

	public $Chmod = null;

	public function setUp() {
		//$this->Fiancial = new FiancialLib();

		parent::setUp();
	}

	public function testArith() {
		$values = array(1, 5, 9);
		$is = FinancialLib::arithmeticMean($values);
		$this->assertEquals($is, 5);

		$values = array(-111.5, 5.6, 9.1, 58.1);
		$is = FinancialLib::arithmeticMean($values);
		$this->assertEquals(round($is, 3), -9.675);
	}


	public function testGeo() {
		$values = array(1, 5, 9);
		$is = FinancialLib::geometricMean($values);
		$this->assertEquals(round($is, 3), 6.708);

		$values = array(-111.5, 5.6, 9.1, 58.1);
		$is = FinancialLib::geometricMean($values);
		$this->assertEquals($is, 'NAN');	# why???
	}

}

