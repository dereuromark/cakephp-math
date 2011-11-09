<?php

App::import('Lib', 'Math.HalfLifeLib');
App::uses('MyCakeTestCase', 'Tools.Lib');

class HalfLifeLibTest extends MyCakeTestCase {

	public $HalfLife = null;

	public function startTest() {
		$this->HalfLife = new HalfLifeLib();
	}
	
/** Start **/

	public function testAge() {
	
		$result = array(
			array(0, 100, 0),
			array(1000, 0, 0),
			array(1662721.3180286, 99.9, 2400),
			array(6814.1970809396, 0.000000001, 248999)
		);
		
		foreach($result as $key => $value) {
			pr($value);
			$is = $this->HalfLife->age($value[0], $value[1]);
			$this->assertEqual(round($is, 3), round($value[2], 3));
		}
			
	}
	
	public function testHlife() {
	
		$result = array(
			$this->HalfLife->hlife(5000, 100),
			$this->HalfLife->hlife(2400, 99.9),
			$this->HalfLife->hlife(9000, 33),
			$this->HalfLife->hlife(80010, 10),
			$this->HalfLife->hlife(56300, 0),
			$this->HalfLife->hlife(248999, 0.000000001)
		);
	
		
	
		$expectedResult = array(0, 1662721.3180286, 5626.8917947255,
			24085.41, 0, 6814.1970809396);
	
		foreach($result as $key => $value) {
			pr($key.': '.$value);
			$is = round($value, 3);
			$expected = round($expectedResult[$key], 3);
			$this->assertIdentical($is, $expected);
		}
	}
	
	public function testActivity() {
	
		$result = array(
			array(0, 100, 100),
			array(100, 100, 50),
			array(5000, 0, 0),
			array(2400, 1662721.3180286, 99.9),
			array(9000, 5626.8917947255, 33),
			array(80010, 24085.41, 10),
			array(56300, 0, 0),
			array(248999, 6814.1970809396, 0.000000001)
		);
		
		foreach($result as $key => $value) {
			pr($value);
			$is = $this->HalfLife->activity($value[0], $value[1]);
			$this->assertEqual(round($value[2], 3), round($is, 3));
		}
	}
}
