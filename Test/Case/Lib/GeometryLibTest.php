<?php

App::uses('GeometryLib', 'Math.Lib');

/**
 * testing
 * 2009-07-15 ms
 */
class GeometryLibTest extends CakeTestCase {

	public function setUp() {
		$this->Geometry = new GeometryLib();

	}

	public function testPythagoras() {
		$is = $this->Geometry->pythagoras(3, 3);
		$this->assertEquals(round($is, 3), 4.243);

		$is = $this->Geometry->pythagoras(4, 5);
		$this->assertEquals(round($is, 3), 6.403);

		$is = $this->Geometry->pythagoras(3,4);
		$this->assertEquals($is, 5);

		# line:
		$is = $this->Geometry->pythagoras(0, 7);
		$this->assertEquals($is, 7);

		$is = $this->Geometry->pythagoras(7, 0);
		$this->assertEquals($is, 7);

	}


	public function testDistance() {
		$is = $this->Geometry->distance(2, 3, 6, 7);
		$this->assertEquals(round($is, 3), 5.657);
	}


	public function testSlopeAngle() {
		$is = $this->Geometry->slopeAngle(2, 3, 2, 3);
		$this->assertEquals(round($is, 3), 0);

		$is = $this->Geometry->slopeAngle(1, 1, 2, 1);
		$this->assertEquals(round($is, 3), 0);

		$is = $this->Geometry->slopeAngle(2, 3, 6, 7);
		$this->assertEquals(round($is, 3), 0.785);

		$is = $this->Geometry->slopeAngle(0, 0, 1, 1);
		$this->assertEquals(round($is, 3), 0.785);
	}



	/**
	 * 2010-09-27 ms
	 */
	public function testAngleSum() {
		$is = $this->Geometry->angleSum(1);
		$this->assertEquals($is, false);

		$is = $this->Geometry->angleSum(2);
		$this->assertEquals($is, 0);

		$is = $this->Geometry->angleSum(3);
		$this->assertEquals($is, 180);

		$is = $this->Geometry->angleSum(4);
		$this->assertEquals($is, 360);

		$is = $this->Geometry->angleSum(6);
		$this->assertEquals($is, 720);
	}



/** End **/

}

