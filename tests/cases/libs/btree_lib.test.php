<?php

App::import('Lib', 'Math.BtreeLib');

/**
 * testing
 * 2009-07-15 ms
 */
class BtreeLibCase extends CakeTestCase {
	//var $Btree = null;

	function startTest() {
		
	}
	
	

/** Start **/

	//TODO: fixme!!!
	function testShellBtree() {	
		$temp[0] = "X";
		$temp[1] = "A";
		$temp[2] = "Zoo";
		$temp[3] = "Programming";
		$temp[4] = "BasicA";
		
		
		print "<b>Original Array</b><br>";
		
		/*Code to print the Array
		* TO be remove in actual 
		*/
		print $temp[0] . "<br>";
		print $temp[1] . "<br>";
		print $temp[2] . "<br>";
		print $temp[3] . "<br>";
		print $temp[4] . "<br><br>";
		
		$Test = new BtreeLib($temp, 5);
		
		print "<b>Pointers</b><br><b>Left:</b>";
		
		/*Code to print the Left and Right Pointers
		*TO be remove in actual                   
		*/
		for ($i = 1; $i <= 5; $i++) {
			print intval($Test->LeftPointer[$i]);
		}
		
		print "<br><b>Right:</b>";
		
		for ($i = 1; $i <= 5; $i++) {
			print intval($Test->RightPointer[$i]);
		}
		
		print "<br><br><b>Sorted List.</b><br>";
		
		
		/* Code to print the Sorted List
		* TO be remove in actual       
		*/
		for ($i = 1; $i <= 5; $i++) {
			print $Test->SortedArray[$i] . "<br>";
		}
		
		
		print "<br><b>Search 'Zoo':</b> " . $Test->Search("Zoo");
	}


/** End **/

}

