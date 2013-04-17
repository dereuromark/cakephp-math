<?php

App::import('Lib', 'Math.EquationLib');
App::uses('MyCakeTestCase', 'Tools.TestSuite');

class EquationLibTest extends MyCakeTestCase {

	public function setUp() {
		$this->EquationLib = new EquationLib();
	}

	public function tearDown() {

	}

	public function testObject() {
		$this->assertInstanceOf('EquationLib', $this->EquationLib);
	}

	public function testX() {
		//TODO
	}

}
