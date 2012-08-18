<?php

/**
 * physics formula
 * 2010-11-05 ms
 */
class PhysicsLib {


/** Force and Motion **/


	/**
	 * with constant velocity
	 * @return float
	 * 2010-11-05 ms
	 */
	public function averageSpeed($distance, $time) {
		if ($time == 0) {
			return 0;
		}
		return $distance/$time;
	}

	/**
	 * 2010-11-05 ms
	 */
	public function acceleration() {

	}

	/**
	 * with constant accelelaration
	 * 2010-11-05 ms
	 */
	public function speed($initV, $acc, $time) {

	}

	public function velocity($initV, $acc, $time) {

	}

	/**
	 * unit: (kg ms^(-1))
	 */
	public function momentum($mass, $velocity) {
		//$res = $m KREUZ $v
		//return $res;
	}

	public function impulse($force, $time) {

	}

	public function impulsiveForce() {

	}

	public function kineticEnergy() {

	}

	public function gravitationalPotentialEnergy() {

	}

	public function elasticPotentialEnergy() {

	}

	/**
	 * @param $float work or energy (J or Nm)
	 * 2010-11-05 ms
	 */
	public function power($workOrEnergy, $time) {

	}

	public function efficiency($usefulE, $totalE, $percentage = false) {
		if ($totalE == 0) {
			return 0;
		}
		$res = $usefulE/$totalE;
		if (!$percentage) {
			return $res;
		}
		return $res*100;
	}

	public function HookesLaw() {

	}

/** Force and Pressure **/

	public function pressure($force, $area) {

	}

	public function liquidPressure($depth, $density, $g) {

	}

	public function BoylesLaw() {

	}

	public function PressureLaw($p1, $t1, $p2, $t2) {

	}

	public function CharlesLaw($v1, $t1, $v2, $t2) {

	}

	public function universalGasLaw() {

	}


/** Light **/

	/**
	 * unit: m/s
	 * @return float
	 * 2010-11-05 ms
	 */
	public function speedOfLight() {
		return 299792458;
	}

	/**
	 * unit: m
	 * @return float
	 * 2010-11-05 ms
	 */
	public function lightSecond() {
		return $this->speedOfLight();
	}



}


