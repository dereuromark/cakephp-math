<?php


class FinancialLib {


	function arithmeticMean($values = array()) {
		$sum = 0;
		if (empty($values)) {
			return $sum;
		}
		foreach ($values as $value) {
			$sum += $value;
		}
		return $sum/count($values);
	}
	

	function geometricMean($values = array()) {
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



