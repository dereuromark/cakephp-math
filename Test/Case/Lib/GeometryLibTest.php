<?php

App::import('Lib', 'Math.GeometryLib');

/**
 * testing
 * 2009-07-15 ms
 */
class GeometryLibTest extends CakeTestCase {

	public function startTest() {
		$this->Geometry = new GeometryLib();

	}

	public function testPythagoras() {
		$is = $this->Geometry->pythagoras(3, 3);
		$this->assertEqual(round($is, 3), 4.243);
		
		$is = $this->Geometry->pythagoras(4, 5);
		$this->assertEqual(round($is, 3), 6.403);

		$is = $this->Geometry->pythagoras(3,4);
		$this->assertEqual($is, 5);

		# line:
		$is = $this->Geometry->pythagoras(0, 7);
		$this->assertEqual($is, 7);
		
		$is = $this->Geometry->pythagoras(7, 0);
		$this->assertEqual($is, 7);
		
	}
	
	
	public function testDistance() {
		$is = $this->Geometry->distance(2, 3, 6, 7);
		$this->assertEqual(round($is, 3), 5.657);
	}
	
	
	public function testSlopeAngle() {
		$is = $this->Geometry->slopeAngle(2, 3, 2, 3);
		$this->assertEqual(round($is, 3), 0);
		
		$is = $this->Geometry->slopeAngle(1, 1, 2, 1);
		$this->assertEqual(round($is, 3), 0);
		
		$is = $this->Geometry->slopeAngle(2, 3, 6, 7);
		$this->assertEqual(round($is, 3), 0.785);
		
		$is = $this->Geometry->slopeAngle(0, 0, 1, 1);
		$this->assertEqual(round($is, 3), 0.785);
	}
		
	
	
	/**
	 * 2010-09-27 ms
	 */
	public function testAngleSum() {
		$is = $this->Geometry->angleSum(1);
		$this->assertEqual($is, false);
		
		$is = $this->Geometry->angleSum(2);
		$this->assertEqual($is, 0);
		
		$is = $this->Geometry->angleSum(3);
		$this->assertEqual($is, 180);
		
		$is = $this->Geometry->angleSum(4);
		$this->assertEqual($is, 360);
		
		$is = $this->Geometry->angleSum(6);
		$this->assertEqual($is, 720);
	}
	


/** End **/

}

