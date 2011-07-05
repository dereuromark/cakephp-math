<?php

App::import('Lib', 'Math.DijkstraLib');

/**
 * testing
 * 2009-07-15 ms
 */
class DijkstraLibCase extends CakeTestCase {
	var $Chmod = null;

	function startTest() {
		//$this->Chmod = new MathLib();
	}
	
	

/** Start **/

	function testDijkstra() {
		
		# Examples 
		// single direction route path
		$aRoutes = array(
			array(0,0,0),
			array(0,1,10),
			array(0,3,30), // use something like array(3,0,20) to define a two way map   
			array(0,4,100),
			array(1,1,0),
			array(1,2,50),
			array(2,2,0),
			array(2,4,10),
			array(3,3,0),
			array(3,2,20),
			array(3,4,60),
			array(4,4,0),
		);
		$oDijk = new DijkstraLib(0, $aRoutes); // startPoint = 0
		
		pr($oDijk->getPath());
		
		$is = $oDijk->getDistance();
		pr($is);
		
		$expected = array(
			1 => 10,
			3 => 30,
			4 => 60,
			2 => 50,
			0 => 0
		);	
		$this->assertEqual($is, $expected);
	}


/** End **/

}

