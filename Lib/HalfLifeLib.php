<?php
// Class: RCD
// By: Seb Renauld
// License: GNU

class HalfLifeLib {

	/**
	 * Returns the age from the half life
	 * in years, and the percentage of
	 * activity at the time (where the initial
	 * activity is 100
	 *
	 * For example:
	 * Carbon 14: half-life: 5568
	 * pca: 95
	 */
	public function age($hlife, $pca) {

		if($hlife == 0 || $pca <= 0 || $pca > 100) {
			return 0;
		}

		$alpha = $hlife/log(2);
		$age = $alpha*log(100/$pca);
		return $age;


		//unit = "y";
			/*
			if ($age <= 1) {
				$age = $age*365;
				$unit = "d";
				if ($age <= 1) {
					$age = $age*24;
					$unit = "h";
					if ($age <= 1) {
						// Seconds are more precise :)
						$age = $age*3600;
						$unit = "s";
					}
				}
			}
			*/


	}

	/**
	 * Finds the half-life of something
	 * When the age and current activity is given.
	 * Reverse of the first formula :)
	 * Age in years, as ever
	 *
	 * @return float $hilfe (in years)
	 */
	public function hlife($age, $curact) {
		if ($curact < 100 && $curact > 0) {
			$alpha = log(100/$curact)/$age;
			$hlife = log(2)/$alpha;
			return $hlife;
		}
		return 0;
	}

	/**
	 * Finds the current activity (in percent)
	 * from the age and half-life. Same as ever ;)
	 *
	 * @return float $activity (in %)
	 */
	public function activity($age, $hlife) {
		if($hlife == 0) {
			return 0;
		}
		if($age == 0) {
			return 100;
		}
		$alpha = $hlife / log(2);
		$activity = 100 / exp($age/$alpha);
		return $activity;
	}
}
