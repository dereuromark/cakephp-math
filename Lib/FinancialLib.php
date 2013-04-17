<?php

class FinancialLib {

	public static function arithmeticMean($values = array()) {
		$sum = 0;
		if (empty($values)) {
			return $sum;
		}
		foreach ($values as $value) {
			$sum += $value;
		}
		return $sum/count($values);
	}

	public static function geometricMean($values = array()) {
		$product = 1;
		if (empty($values)) {
			return 0;
		}
		foreach ($values as $value) {
			$product *= $value;
		}
		return sqrt($product);
	}

}
