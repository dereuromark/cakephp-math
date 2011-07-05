<?php
/*
* Class      : Gravity
* Version    : 0.1 Beta
* Author     : Abdellah BEN RAHMOUN
* Date       : 20 October 2010
* Copyright  : Abdellah BEN RAHMOUN
* License    : GNU LESSER GENERAL PUBLIC LICENSE
* This Class Is Programmed For Gravity Calculs
* PhpVersion > Php 5  (Supported Php6)
*/

/**
 * refactored and properly commented by mark scherer
 * 2010-11-05 ms
 */
class GravityLib {
	
	/**
	 * G (Newtonian gravitational constant)
	 * unit: N m^2/kg^2
	 * @return float
	 * 2010-11-05 ms
	 */
	function gConstant() {
		return 6.67 * pow(10, -11);
	}
	
	/**
	 * Newtonian gravitational coupling
	 * 2010-11-05 ms
	 */
	function newton($m1, $m2, $d) {
		return $this->gConstant() * (($m1 * $m2) / pow($d, 2));
	}

	/**
	 * unit: N (kg m s^(-2))
	 * @param float $mass
	 * @return float
	 * 2010-11-05 ms
	 */
	function iWeight($m) {
		return $this->g0Constant() * $m;
	}
	
	/**
	 * g0 (Standard gravity, or standard acceleration due to free fall)
	 * unit: m/s^2
	 * @return float
	 * 2010-11-05 ms
	 */
	function g0Constant() {
		return 9.80665;
	}

	/**
	 * gravity measure at height  above sea level
	 * re: the Earth's mean radius.
	 * @param float $height
	 * @return float
	 * 2010-11-05 ms
	 */
	function gVariable($h) {
		$re = 637 * pow(10, 3);
		$a = $re / ($re + $h);
		return pow($a, 2) * $this->g0Constant();
	}
}


