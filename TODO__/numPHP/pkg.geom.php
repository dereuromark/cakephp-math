<?php
/*
 * pkg.geom.php3
 *
 * A collection of functions and classes to deal with geometrical
 * entities.
 * (c) Jesus M. Castagnetto, 1999, 2000
 * 
 * $Id: pkg.geom.php,v 1.3 2000/02/27 09:46:37 jmcastagnetto Exp $
 */

########################################

// needs utils.inc.php

/*
 * Definitions:
 * point = an array of coordinates, e.g. $point = array(x,y,z,...)
 * pointlist = an array of points
 */

function distance ($point1, $point2) {
	// check that both points are of equal dimensionality
	if (count($point1) != count($point2)) {
		throwError("Points are not of equal dimensionality");
		return NULL;
	}
	// calculate the cartesian distance
	for ($i=0; $i<count($point1); $i++) {
		$sum2 +=  pow((doubleval($point1[$i]) - doubleval($point2[$i])), 2);	
	}
	return sqrt($sum2);
}


function areWithinDistance ($point1, $point2, $cutoff) {
	$dist = distance($point1, $point2);
	if (!isError()) {
		return $dist <= doubleval($cutoff);
	} else {
		return NULL;
	}
}

function pointsWithinDistance ($point, $pointlist, $cutoff) {
	$pcloser = array();
	for ($i=0; $i<count($pointlist); $i++) {
//		echo "i = $i ".distance($point, $pointlist[$i])."\n";
		$bool = areWithinDistance($point, $pointlist[$i], $cutoff);
		if (!isError()) {
			if ($bool) {
				$pcloser[] = $pointlist[$i];
			}
		} else {
			return NULL;
		}
	}
	return $pcloser;
}


/*
 * The following functions handle 2 and 3 dimensional points
 * and are completely untested
 */

function areColinear($pointlist) {
	$errormsg = "Insuficient number of points to test colinearity";
	// check dimensions
	$dim = count($pointlist[0]);
	switch ($dim) {
		case 2 :
			if ( count($pointlist) < 2 ) {
				throwError($errormsg);
				return NULL;
			}
			// get line coefficients
			// y = a + bx
			$p1 = $pointlist[0];
			$p2 = $pointlist[1];
			$b = (float) ($p2[1] - $p1[1]) / ($p2[0] - $p1[0]);
			$a = (float) $p1[1] - $p[0]*$b;
			for ($i<0; $i<count($pointlist); $i++) {
				$tp = $pointlist[$i];
				if ($tp[1] != $a + $b*$tp[0]) {
					return false;
				}
			}
			return true;
			break;

		case 3 :
			if ( count($pointlist) < 3 ) {
				throwError($errormsg);
				return NULL;
			}
			// get line coefficients
			// z = a + bx + cy
			$p1 = $pointlist[0];
			$p2 = $pointlist[1];
			$p3 = $pointlist[2];

			$dz12 = $p2[2] - $p1[2];
			$dz13 = $p3[2] - $p1[2];
			$dy12 = $p2[1] - $p1[1];
			$dy13 = $p3[1] - $p1[1];
			$dx12 = $p2[0] - $p1[0];
			$dx13 = $p3[0] - $p1[0];
			
			$c = ( ($dz13 * $dx12) - ($dz12 * dx13) ) / ( ($dy13 * $dx12) - ($dy12 * $dx13) );
			$b = ( $dz12 - ($dy12 * $c) ) / $dx12;
			$a = $p1[2] - ($b * $p1[0]) - ($c * $p1[1]); 
			for ($i<0; $i<count($pointlist); $i++) {
				$tp = $pointlist[$i];
				if ($p1[2] != $a + ($b * $p1[0]) + ($c * $p1[1])) {
					return false;
				}
			}
			return true;
			break;

		default:
			throwError("Not implemented for dimensions other that 2 or 3");
			return NULL;
			break;
	}
}

?>
