<?php

/**
 * physics formula
 * 2010-11-05 ms
 */
class PhsyicsLib {


/** Force and Motion **/

	
	/**
	 * with constant velocity
	 * @return float
	 * 2010-11-05 ms
	 */
	function averageSpeed($distance, $time) {
		if ($time == 0) {
			return 0;
		}
		return $distance/$time;
	}
	
	/**
	 * 2010-11-05 ms
	 */
	function acceleration() {
		
	}
	
	/**
	 * with constant accelelaration
	 * 2010-11-05 ms
	 */
	function speed($initV, $acc, $time) {
		
	}
	
	function velocity($initV, $acc, $time) {
		
	}
	
	/**
	 * unit: (kg ms^(-1))
	 */
	function momentum($mass, $velocity) {
		//$res = $m KREUZ $v
		//return $res;
	}
	
	function impulse($force, $time) {
		
	}
	
	function impulsiveForce() {
		
	}
	
	function kineticEnergy() {
		
	}
	
	function gravitationalPotentialEnergy() {
		
	}

	function elasticPotentialEnergy() {
		
	}

	/**
	 * @param $float work or energy (J or Nm)
	 * 2010-11-05 ms
	 */
	function power($workOrEnergy, $time) {
		
	}	
	
	function efficiency($usefulE, $totalE, $percentage = false) {
		if ($totalE == 0) {
			return 0;
		}
		$res = $usefulE/$totalE;
		if (!$percentage) {
			return $res;
		}
		return $res*100;	
	}	
	
	function HookesLaw() {
		
	}
	
/** Force and Pressure **/	

	function pressure($force, $area) {
		
	}

	function liquidPressure($depth, $density, $g) {
		
	}
	
	function BoylesLaw() {
		
	}
	
	function PressureLaw($p1, $t1, $p2, $t2) {
		
	}
	
	function CharlesLaw($v1, $t1, $v2, $t2) {
		
	}
	
	function universalGasLaw() {
		
	}
	
	
/** Light **/

	/**
	 * unit: m/s
	 * @return float
	 * 2010-11-05 ms
	 */
	function speedOfLight() {
		return 299792458;
	}
	
	/**
	 * unit: m
	 * @return float
	 * 2010-11-05 ms
	 */	
	function lightSecond() {
		return $this->speedOfLight();
	}
	
	

}


