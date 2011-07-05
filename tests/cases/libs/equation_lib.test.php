<?php

App::import('Lib', 'Math.EquationLib');
App::import('Vendor', 'MyCakeTestCase');

class EquationLibTest extends MyCakeTestCase {
	
	function setUp() {
		$this->EquationLib = new EquationLib();
	}
	
	function tearDown() {
		
	}
	
	function testObject() {
		$this->assertTrue(is_a($this->EquationLib, 'EquationLib'));
	}
		
	function testX() {
		//TODO
	}
	
}
