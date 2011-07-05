<?php

App::import('Lib', 'Math.MathLib');

/**
 * testing
 * 2009-07-15 ms
 */
class MathLibCase extends CakeTestCase {
	var $Chmod = null;

	function startTest() {
		$this->Chmod = new MathLib();

	}
	
	function testFact() {
		$is = MathLib::factorize(0);
		$this->assertEqual($is, array(0));
		
		$is = MathLib::factorize(1);
		$this->assertEqual($is, array(1));
		
		$is = MathLib::factorize(2);
		$this->assertEqual($is, array(2));
		
		$is = MathLib::factorize(3);
		$this->assertEqual($is, array(3));
		
		$is = MathLib::factorize(4);
		$this->assertEqual($is, array(2, 2));
		
		$is = MathLib::factorize(28);
		pr($is);
		$this->assertEqual($is, array(2, 2, 7));
		
		$is = MathLib::factorize(28, true);
		pr($is);
		$this->assertEqual($is, array(7, 2, 2));
	}
	
	
	function testIsEven() {
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
	
	function testEquation() {
		$is = MathLib::equation(2, 4, 5);
		pr($is);
		$this->assertTrue(count($is) == 2);
		
		$is = MathLib::equation(5, 3, 5);
		pr($is);
		$this->assertTrue(count($is) == 2);
	}
	
	function testCrossTotal() {
		$is = MathLib::crossTotal(0);
		$this->assertEqual($is, 0);
		
		$is = MathLib::crossTotal(7);
		$this->assertEqual($is, 7);
		
		$is = MathLib::crossTotal(117);
		$this->assertEqual($is, 9);
		
		$is = MathLib::crossTotal(6771);
		$this->assertEqual($is, 21);
		
		$is = MathLib::crossTotal('6123');
		$this->assertEqual($is, 12);
	}
	
	
	function testFac() {
		$is = MathLib::factorial(0);
		$this->assertEqual($is, 1);
		
		$is = MathLib::factorial(1);
		$this->assertEqual($is, 1);
		
		$is = MathLib::factorial(2);
		$this->assertEqual($is, 2);
		
		$is = MathLib::factorial(3);
		$this->assertEqual($is, 6);
		
		$is = MathLib::factorial(4);
		$this->assertEqual($is, 24);
	}
	

/** Start **/

	function testAckermann() {

		//$is = $this->Chmod->convertFromOctal(0777);
		$is = MathLib::ackermann(1, 2);
		$expected = 4;
		$this->assertEqual($expected, $is);

		$is = MathLib::ackermann(1, 6);
		$expected = 8;
		$this->assertEqual($expected, $is);

		$is = MathLib::ackermann(2, 1);
		$expected = 5;
		$this->assertEqual($expected, $is);

		$is = MathLib::ackermann(2, 2);
		$expected = 7;
		$this->assertEqual($expected, $is);

		$is = MathLib::ackermann(2, 4);
		$expected = 11;
		$this->assertEqual($expected, $is);

		$is = MathLib::ackermann(3, 3);
		$expected = 61;
		$this->assertEqual($expected, $is);

		/*
		//TOO HUGE
		$is = MathLib::ackermann(4, 1);
		$expected = 61;
		$this->assertEqual($expected, $is);
		*/
	}


	function testiIsPrime() {
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

