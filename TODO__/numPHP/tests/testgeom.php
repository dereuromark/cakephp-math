<?php

/*
 * Code for testing the Geometry package (pkg.geom.php)
 * (c) Jesus M. Castagnetto 1999,2000.
 *
 * $Id: testgeom.php,v 1.2 2000/02/27 09:45:50 jmcastagnetto Exp $
 */

require("../utils.inc.php");
require("../pkg.geom.php");

$p1 = array(2,3);
$p2 = array(3,4);

echo "Distance p1,p2: ".distance($p1,$p2)."\n";

$p3 = array(3.4,5,6,6);
$p4 = array(23.0,34,12.0,4.5);

$p5 = array(2.5, 3.5);

$d = distance($p3,$p2);

echo "Distance p2,p3: ";
printError();

echo "Distance p3,p4: ".distance($p3,$p4)."\n";

echo "Points p2 and p5 are ";
if (areWithinDistance($p2,$p5,1.0)) {
	echo "within 1.0 : ";
} else {
	echo "not within 1.0 : ";
}
echo distance($p2,$p5)."\n";

$p6 = array(1, 2.1);
$p7 = array(4,5);

clearError();
$plist = array($p2, $p5, $p6, $p7);

$arr = pointsWithinDistance($p1, $plist, 1.35);
echo "Number of point within 1.35 of p1 ".count($arr)."\n";
echo "p1: ".printPoint($p1);
echo "\nplist\n";
echo printPointList($arr);
echo "\n";
echo "p3: ".printPoint($p3)."\n";

/* vim: set ai cin tw=78 ts=4 sw=4: */
?>
