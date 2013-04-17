<?php

App::uses('PhysicsLib', 'Math.Lib');
App::uses('MyCakeTestCase', 'Tools.TestSuite');

class PhysicsLibTest extends MyCakeTestCase {

	public function setUp() {
		$this->PhysicsLib = new PhysicsLib();
	}

	public function tearDown() {

	}

	public function testObject() {
		$this->assertInstanceOf('PhysicsLib', $this->PhysicsLib);
	}

	public function testX() {
		//TODO
	}

}
