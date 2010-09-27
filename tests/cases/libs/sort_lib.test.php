<?php

App::import('Lib', 'Math.SortLib');

/**
 * testing
 * 2009-07-15 ms
 */
class SortLibCase extends CakeTestCase {
	var $Sort = null;

	function startTest() {
		$this->Sort = new SortLib();
	}
	
	var $examples = array(
		array(2, 6, 4, 3, 99, 50, 1, 66, 58, 16, 11, 69),
		array(7, 98, 54, 34, 77),
		array(),	
	);

/** Start **/

	function testShellSort() {	
		$is = $this->Sort->shellSort($this->examples[0]);
		$expected = array(1, 2, 3, 4, 6, 11, 16, 50, 58, 66, 69, 99);
		pr($is);
		$this->assertEqual($is, $expected);
	}


	function testBubbleSort() {
		$is = $this->Sort->bubbleSort($this->examples[0]);
		$expected = array(1, 2, 3, 4, 6, 11, 16, 50, 58, 66, 69, 99);
		pr($is);
		$this->assertEqual($is, $expected);
		
		$is = $this->Sort->bubbleSort($this->examples[0], true);
		$expected = array(99, 69, 66, 58, 50, 16, 11, 6, 4, 3, 2, 1);
		pr($is);
		$this->assertEqual($is, $expected);
	}


	// NOT WORKING
	function testMergeSort() {
		$is = $this->Sort->mergeSort($this->examples[0]);
		$expected = array(1, 2, 3, 4, 6, 11, 16, 50, 58, 66, 69, 99);
		pr($is);
		$this->assertEqual($is, $expected);
	}

	// NOT WORKING
	function testMergeAndSort() {
		$is = $this->Sort->mergeAndSort($this->examples[0], $this->examples[1]);
		$expected = array(1, 2, 3, 4, 6, 11, 16, 50, 58, 66, 69, 99);
		pr($is);
		$this->assertEqual($is, $expected);
	}	

	// NOT WORKING
	function testQuickSort() {
		
		$is = $this->Sort->quickSort($this->examples[0]);
		$expected = array(1, 2, 3, 4, 6, 11, 16, 50, 58, 66, 69, 99);
		pr($is);
		$this->assertEqual($is, $expected);
	}


/** End **/

}
?>