<?php

App::uses('EquationLib', 'Math.Lib');
App::uses('MyCakeTestCase', 'Tools.TestSuite');

class EquationLibTest extends MyCakeTestCase {

	public function setUp() {
		$this->EquationLib = new EquationLib();

		parent::setUp();
	}

	public function testObject() {
		$this->assertInstanceOf('EquationLib', $this->EquationLib);
	}

	public function testX() {
		//TODO
	}

}
