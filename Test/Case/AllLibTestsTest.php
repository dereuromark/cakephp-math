<?php
/**
 * group test - 2011
 */
class AllLibTestsTest extends PHPUnit_Framework_TestSuite {

/**
 * suite method, defines tests for this suite.
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Lib tests');
	$path = dirname(__FILE__);
		$suite->addTestDirectory($path . DS . 'Lib');
		return $suite;
	}
}
