<?php

App::import('Lib', 'Math.PhysicsLib');
App::uses('MyCakeTestCase', 'Tools.Lib');

class PhysicsLibTest extends MyCakeTestCase {

	public function setUp() {
		$this->PhysicsLib = new PhysicsLib();
	}

	public function tearDown() {

	}

	public function testObject() {
		$this->assertTrue(is_a($this->PhysicsLib, 'PhysicsLib'));
	}

	public function testX() {
		//TODO
	}

}
