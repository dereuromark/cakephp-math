<HTML>
<BODY BGCOLOR="white">
<PRE>
<?php

require("../class.hist.php");

/* 
 * Sample test code for the Histogram class (class.hist.php)
 * Jesus M. Castagnetto, 1999, 2000
 *
 * $Id: testhist.php,v 1.2 2000/02/27 09:45:50 jmcastagnetto Exp $
 */

/* create a boring array */
$vals = array(
			1.5,2,3,4,0,3.2,0.1,0,0,5,3,2,3,4,1,2,4,5,1,3,2,4,5,2,3,4,1,2,
			1.5,2,3,4,0,3.2,0.1,0,0,5,3,2,3,4,1,2,4,5,1,3,2,4,5,2,3,4,1,2,
			1.5,2,3,4,0,3.2,0.1,0,0,5,3,2,3,4,1,2,4,5,1,3,2,4,5,2,3,4,1,2
		);


/* create an instance w/o initialization */
$h = new Histogram;

/* do the calculation and print the results */
$h->create($vals,6,"Test 1");
$h->printStats();
$h->printBins();

/* access the result arrays directly*/

$result = $h->getBins();
echo "\n\nresult is of type: ".gettype($result)."\n";
while (list($key,$val) = each($result)) {
	echo $key."\t".$val."\n";
}

$result = $h->getStats();
echo "\n\nresult is of type: ".gettype($result)."\n";
while (list($key,$val) = each($result)) {
	echo $key."\t".$val."\n";
}

/* a new instance w/ initialization */
echo "\n\n============\n\n";
$k = new Histogram($vals,7,"Constructed histogram");
$k->printStats();
$k->printBins();

?>
</PRE>
</BODY></HTML>
