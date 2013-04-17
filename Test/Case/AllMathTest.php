<?php
/**
 * group test
 */
class AllMathTest extends PHPUnit_Framework_TestSuite {

	/**
	 * suite method, defines tests for this suite.
	 *
	 * @return void
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All Math Plugin tests');
		$path = dirname(__FILE__);
		$suite->addTestDirectory($path . DS . 'Lib');
		return $suite;
	}

}
