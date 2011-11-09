<?php

App::import('Lib', 'Math.EquationLib');
App::uses('MyCakeTestCase', 'Tools.Lib');

class EquationLibTest extends MyCakeTestCase {
	
	public function setUp() {
		$this->EquationLib = new EquationLib();
	}
	
	public function tearDown() {
		
	}
	
	public function testObject() {
		$this->assertTrue(is_a($this->EquationLib, 'EquationLib'));
	}
		
	public function testX() {
		//TODO
	}
	
}
