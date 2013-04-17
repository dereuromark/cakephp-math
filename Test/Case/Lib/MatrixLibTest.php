<?php

App::uses('MatrixLib', 'Math.Lib');

/**
 * testing
 * 2009-07-15 ms
 */
class MatrixLibTest extends CakeTestCase {

	public $Matrix = null;

	public $examples5x5 = array(
		array(1, 2, 3, 2, 1),
		array(4, 1, 2, 4, 2),
		array(3, 3, 5, 6, 3),
		array(2, 2, 1, 1, 1),
		array(2, 3, 1, 4, 1),
	);

	public $examples4x4 = array(
		array(1, 2, 3, 2),
		array(4, 1, 2, 4),
		array(3, 3, 5, 6),
		array(2, 2, 1, 1),
	);

	public $examples3x3 = array(
		array(1, 2, 3),
		array(4, 1, 2),
		array(3, 3, 5),
	);

	public $examples2x2 = array(
		array(2, 6),
		array(7, 8)
	);

	public $examples3x1 = array(
		array(2),
		array(5),
		array(1)
	);

	public $examples1x3 = array(
		array(2, 3, 5)
	);

	public $examples1x1 = array(
		array(2)
	);

	public function setUp() {
		//$this->Matrix = new MatrixLib($this->examples);
		$this->Matrix = new MatrixLib($this->examples3x3);

		parent::setUp();
	}

	public function testClean() {
		$is = $this->Matrix->clean($this->examples3x3);
		//pr($is);
		$this->assertEquals($is, $this->examples3x3);

		$a = array(array(0, 2), array('', 'A'), array(null, '3'));
		$a2 = array(array(0, 2), array(0, 0), array(0, 3));

		$is = $this->Matrix->clean($a);
		//pr($is);
		$this->assertEquals($is, $a2);
	}

	public function testDim() {
		$is = $this->Matrix->dimension();
		$this->assertEquals($is, array(3, 3));

		$this->Matrix->set($this->examples1x3);
		$is = $this->Matrix->dimension('m');
		$this->assertEquals($is, 1);

		$is = $this->Matrix->dimension('n');
		$this->assertEquals($is, 3);
	}

	public function testMultiply() {
		$is = $this->Matrix->multiply(2);
		$is = $this->Matrix->get();
		$expected = array(
			array(2, 4, 6),
			array(8, 2, 4),
			array(6, 6, 10),
		);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples1x3);
		$is = $this->Matrix->multiply($this->examples3x1);
		$this->assertTrue($is);

		$is = $this->Matrix->get();
		$expected = array(
			array(4, 15, 5)
		);
		$this->assertEquals($is, $expected);
	}

	public function testSym() {
		$array = array(
			array(2, 4),
			array(4, 1)
		);
		$this->Matrix->set($array);
		$is = $this->Matrix->isSymmetric();
		$this->assertTrue($is);

		$array = array(
			array(2, 6),
			array(4, 1)
		);
		$this->Matrix->set($array);
		$is = $this->Matrix->isSymmetric();
		$this->assertFalse($is);

	}

	public function testSkeySym() {
		$array = array(
			array(2, -4),
			array(4, 1)
		);
		$this->Matrix->set($array);
		$is = $this->Matrix->isSkewSymmetric();
		$this->assertTrue($is);
	}

	public function testInverse() {
		echo '<h3>Inverse</h3>';

	}

	public function testTrans() {
		echo '<h3>Transpose</h3>';
		$this->Matrix->set($this->examples1x3);
		$is = $this->Matrix->transpose();
		$is = $this->Matrix->get();
		pr($is);
		$expected = array(
			array(2),
			array(3),
			array(5)
		);
		$this->assertEquals($is, $expected);
	}

	public function testGetIdentityMatrix() {
		$is = $this->Matrix->getIdentityMatrix(2);
		$expected = array(
			array(1, 0),
			array(0, 1)
		);
		$this->assertEquals($is, $expected);
	}

	public function testDeterminant() {
		$this->Matrix->set($this->examples1x1);
		$is = $this->Matrix->determinant();
		$expected = 2; # correct
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples2x2);
		$is = $this->Matrix->determinant();
		$expected = -26; # correct
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples3x3);
		$is = $this->Matrix->determinant();
		$expected = -2; # correct
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples4x4);
		$is = $this->Matrix->determinant();
		$expected = false; //-22; # correct
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples5x5);
		$is = $this->Matrix->determinant();
		$expected = false; //44; # correct
		pr($is);
		$this->assertEquals($is, $expected);
	}

	public function testPermanent() {
		$this->Matrix->set($this->examples1x1);
		$is = $this->Matrix->permanent();
		$expected = 2;
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples2x2);
		$is = $this->Matrix->permanent();
		$expected = 58;
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples3x3);
		$is = $this->Matrix->permanent();
		$expected = 108;
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples4x4);
		$is = $this->Matrix->permanent();
		$expected = false; //149;
		pr($is);
		$this->assertEquals($is, $expected);

		$this->Matrix->set($this->examples5x5);
		$is = $this->Matrix->permanent();
		$expected = false; //341;
		pr($is);
		$this->assertEquals($is, $expected);
	}

/** End **/

}

