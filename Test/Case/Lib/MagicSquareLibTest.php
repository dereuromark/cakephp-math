<?php

App::uses('MagicSquareLib', 'Math.Lib');

/**
 * testing
 * 2009-07-15 ms
 */
class MagicSquareLibTest extends CakeTestCase {
	public $MagicSquare = null;

	public function setUp() {
		parent::setUp();
	}

	public function testMagicConstant() {
		$is = MagicSquareLib::magicConstant(3);
		$expected = 15;
		$this->assertSame($expected, $is);
	}

	public function testIsMagic() {
		$array = array(
			array(8, 1, 6),
			array(3, 5, 7),
			array(4, 9, 2),
		);
		$is = MagicSquareLib::isMagic($array);
		$this->assertTrue($is);
	}

	public function testGetMagicConstant() {
		$this->MagicSquare = new MagicSquareLib();
		$is = $this->MagicSquare->getMagicConstant();
		$expected = 15;
		$this->assertSame($expected, $is);

		/*
		$this->MagicSquare = new MagicSquareLib(4);
		$is = $this->MagicSquare->getMagicConstant();
		$expected = 34;
		$this->assertSame($expected, $is);
		*/

		$this->MagicSquare = new MagicSquareLib(5);
		$is = $this->MagicSquare->getMagicConstant();
		$expected = 65;
		$this->assertSame($expected, $is);

		$this->MagicSquare = new MagicSquareLib(9);
		$is = $this->MagicSquare->getMagicConstant();
		$expected = 369;
		$this->assertSame($expected, $is);
	}

	public function testGetSquare() {
		$this->MagicSquare = new MagicSquareLib();
		$is = $this->MagicSquare->getSquare();
		$expected = array(
			array(8, 1, 6),
			array(3, 5, 7),
			array(4, 9, 2),
		);
		$this->assertEquals($expected, $is);

		$is = $this->MagicSquare->isMagic($is);
		$this->assertTrue($is);

		$this->MagicSquare = new MagicSquareLib(13);
		$is = $this->MagicSquare->getSquare();
		$this->assertSame(13, count($is));

		echo MagicSquareLib::toTable($is);
		$is = $this->MagicSquare->isMagic($is);
		$this->assertTrue($is);
	}

}

