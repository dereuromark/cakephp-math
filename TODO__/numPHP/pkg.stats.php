<?php

/*
 * Statistical functions package
 * (c) Jesus M. Castagnetto 1999,2000.
 *
 * $Id: pkg.stats.php,v 1.2 2000/02/27 09:32:01 jmcastagnetto Exp $
 */

define ("VER", intval(phpversion()));	// major version

/* simple statistic functions */

if ( VER < 4 ) {

	public function sum ($numarr) {
		return sumN ($numarr, 1);
	}

	public function sum2 ($numarr) {
		return sumN ($numarr, 2);
	}

	public function sumN ($numarr, $n) {
		for ($i=0; $i<count($numarr); $i++) {
			$sumN += pow($numarr[$i], $n);
		}
		return $sumN;
	}

} else {

	public function sumN ($numarr, $n) {
		if (count($numarr) > 1) {
			return pow($numarr[0],$n) + sumN(array_slice($numarr, 1), $n);
		} else {
			return pow($numarr[0],$n);
		}
	}

	public function sum ($numarr) {
		return sumN ($numarr, 1);
	}

	public function sum2 ($numarr) {
		return sumN ($numarr, 2);
	}

}

function mean ($numarr) {
	$n = count ($numarr);
	return ( sum($numarr) / $n );
}


function _sumvar ($numarr, $mean) {
	for ($i=0; $i<count($numarr); $i++) {
		$svar += pow(($numarr[$i] - $mean), 2);
	}
	return $svar;
}

function est_variance ($numarr) {
	$n = count($numarr);
	$mean = mean($numarr);
	return _sumvar($numarr, $mean)/($n - 1);
}

function est_sd ($numarr) {
	return sqrt(est_variance($numarr));
}

function variance_with_mean($numarr, $mean) {
	$n = count($numarr);
	return _sumvar($numarr, $mean) / $n;
}

function sd_with_mean ($numarr, $mean) {
	return sqrt(variance_with_mean($numarr, $mean));
}

function _sumabsdev ($numarr, $mean) {
	for ($i=0; $i<count($numarr); $i++) {
		$sumabsdev += abs($numarr[$i] - $mean);
	}
	return $sumabsdev;
}

function abs_deviation ($numarr) {
	$n = count($numarr);
	$mean = mean($numarr);
	return _sumabsdev($numarr, $mean) / $n;
}

function abs_deviation_with_mean ($numarr, $mean) {
	$n = count($numarr);
	return _sumabsdev($numarr, $mean) / $n;
}

function _sumdiff ($numarr, $power) {
	$mean = mean($numarr);
	for ($i=0; $i<count($numarr); $i++) {
		$sum += pow(($numarr[$i] - $mean), $power);
	}
	return $sum;
}

function moment_n ($numarr, $power) {
	$n = count($numarr);
	$mean = mean($numarr);
	$sd = est_sd($numarr);
	for ($i=0; $i<$n; $i++) {
		$msum += pow(($numarr[$i] - $mean)/$sd, $power);
	}
	return $msum/$n;
}

function skewness ($numarr) {
	$n = count($numarr);
	$s = $n*$n*moment_n($numarr,3)/(($n - 1)*($n - 2));
	return $s;
}

function skewness_big ($numarr) {
	return moment_n($numarr, 3);
}

function kurtosis ($numarr) {
	$n = count($numarr);
	$num = $n*($n - 1)*_sumdiff($numarr,4);
	$num -= 3*($n - 1)*pow(_sumdiff($numarr,2),2);
	$den = ($n - 1)*($n - 2)*($n - 3)*est_sd($numarr);
	return $num/$den;
}

function kurtosis_big ($numarr) {
	return moment_n($numarr, 4) - 3;
}

function median ($numarr) {
	$n = count($numarr);
	sort($numarr);
	if ($n & 1) {
		return $numarr [($n - 1)/2];
	} else {
		return ($numarr [($n - 1)/2] + $numarr [$n/2])/2;
	}
}

function mode ($numarr) {
	for ($i=0; $i<count($numarr); $i++) {
		$key = (string) $numarr[$i];
		$countarr[$key]++;
	}
	arsort($countarr);
	return key($countarr);
}

/* very wrong equation
function quartile ($numarr, $frac) {
	$frac = doubleval($frac);
	sort($numarr);
	$n = count($numarr);
	$i = floor(($n - 1)*$frac);
	$d = ($n - 1)*$frac - $i*($n -1)*$frac;
	$quartile = (1 - $d)*$numarr[$i] + $d*$numarr[($i + 1)];
	//echo $n." ".$i." ".$d." ".$frac."\n";
	return $quartile;
}
*/

?>
