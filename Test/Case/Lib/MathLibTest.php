<?php

App::import('Lib', 'Math.MathLib');

/**
 * testing
 * 2009-07-15 ms
 */
class MathLibTest extends CakeTestCase {
	public $Chmod = null;

	public function startTest() {
		$this->Chmod = new MathLib();

	}

	public function testFact() {
		$is = MathLib::factorize(0);
		$this->assertEquals($is, array(0));

		$is = MathLib::factorize(1);
		$this->assertEquals($is, array(1));

		$is = MathLib::factorize(2);
		$this->assertEquals($is, array(2));

		$is = MathLib::factorize(3);
		$this->assertEquals($is, array(3));

		$is = MathLib::factorize(4);
		$this->assertEquals($is, array(2, 2));

		$is = MathLib::factorize(28);
		pr($is);
		$this->assertEquals($is, array(2, 2, 7));

		$is = MathLib::factorize(28, true);
		pr($is);
		$this->assertEquals($is, array(7, 2, 2));
	}


	public function testIsEven() {
		$is = MathLib::isEven(0);
		$this->assertTrue($is);

		$is = MathLib::isEven(-1);
		$this->assertFalse($is);

		$is = MathLib::isEven(-4);
		$this->assertTrue($is);

		$is = MathLib::isEven(2);
		$this->assertTrue($is);

		$is = MathLib::isEven(1212121);
		$this->assertFalse($is);
	}

	public function testEquation() {
		$is = MathLib::equation(2, 4, 5);
		pr($is);
		$this->assertTrue(count($is) == 2);

		$is = MathLib::equation(5, 3, 5);
		pr($is);
		$this->assertTrue(count($is) == 2);
	}

	public function testCrossTotal() {
		$is = MathLib::crossTotal(0);
		$this->assertEquals($is, 0);

		$is = MathLib::crossTotal(7);
		$this->assertEquals($is, 7);

		$is = MathLib::crossTotal(117);
		$this->assertEquals($is, 9);

		$is = MathLib::crossTotal(6771);
		$this->assertEquals($is, 21);

		$is = MathLib::crossTotal('6123');
		$this->assertEquals($is, 12);
	}


	public function testFac() {
		$is = MathLib::factorial(0);
		$this->assertEquals($is, 1);

		$is = MathLib::factorial(1);
		$this->assertEquals($is, 1);

		$is = MathLib::factorial(2);
		$this->assertEquals($is, 2);

		$is = MathLib::factorial(3);
		$this->assertEquals($is, 6);

		$is = MathLib::factorial(4);
		$this->assertEquals($is, 24);
	}


/** Start **/

	public function testAckermann() {

		//$is = $this->Chmod->convertFromOctal(0777);
		$is = MathLib::ackermann(1, 2);
		$expected = 4;
		$this->assertEquals($expected, $is);

		$is = MathLib::ackermann(1, 6);
		$expected = 8;
		$this->assertEquals($expected, $is);

		$is = MathLib::ackermann(2, 1);
		$expected = 5;
		$this->assertEquals($expected, $is);

		$is = MathLib::ackermann(2, 2);
		$expected = 7;
		$this->assertEquals($expected, $is);

		$is = MathLib::ackermann(2, 4);
		$expected = 11;
		$this->assertEquals($expected, $is);

		$is = MathLib::ackermann(3, 3);
		$expected = 61;
		$this->assertEquals($expected, $is);

		/*
		//TOO HUGE
		$is = MathLib::ackermann(4, 1);
		$expected = 61;
		$this->assertEquals($expected, $is);
		*/
	}


	public function testiIsPrime() {
		$is = MathLib::isPrime(3);
		$this->assertTrue($is);

		$is = MathLib::isPrime(4);
		$this->assertFalse($is);

		$is = MathLib::isPrime(19);
		$this->assertTrue($is);

		$is = MathLib::isPrime(115);
		$this->assertFalse($is);
	}


/** End **/

}

