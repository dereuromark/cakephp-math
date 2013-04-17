<?php

/**
 * common math algorythms
 * 2010-07-05 ms
 */
class MathLib {

	/**
	 * Factorizes a given number
	 * @param int $number (>= 0)
	 * 2010-11-20 ms
	 */
	public static function factorize ($number, $sortDesc = false) {
		if ($number < 2) {
			return array($number);
		}
		$factors = array();
		for ($i=2; $i < $number; $i++) {
			if (0 == ($number % $i)) {
				$factors[] = $i;
				$number = $number / $i;
				$i++;
			}
		}
		$factors[] = $number;
		if ($sortDesc) {
			rsort($factors);
		} else {
			sort($factors);
		}
		return $factors;
	}

	/**
	 * //TODO: return array with composite prime numbers instead of false?
	 * (Maybe in own class Composite Factoring)
	 * //FIXME!!! O(n^2) to O(log n)?
	 * 2010-07-05 ms
	 */
	public static function isPrime($number) {
		/*
		$limit = round(sqrt($number));
		$counter = 2;
		while ($counter <= $limit){
		if($number % $counter == 0){
		return true;
		}
		$counter ++;
		}
		return false;
		*/
		$No = 0;
		for ($CurrNum = 2; $CurrNum <= $number; $CurrNum++) {
			for ($Divisor = 2; $Divisor < $CurrNum; $Divisor++) {
				$Res = $CurrNum / $Divisor;
				if ($Res != 1 && intval($Res) == $Res) {
					$No = 1;
					$Divisor = $CurrNum;
				}
			}
			if ($No != 1) {
				$Result = $CurrNum;
			}
			$No = 0;
		}
		// If the only divisor is the number itself, it's prime
		if ($Result == $number) {
			return true;
		}
		return false;
	}

	public static function findPrimes($limit = 100) {
		$sqrt = sqrt($limit);
		$isPrime = array_fill(0, $limit + 1, false);

		for ($i = 1; $i <= $sqrt; $i++) {
			for ($j = 1; $j <= $sqrt; $j++) {
				$n = 4 * pow($i, 2) + pow($j, 2);

				if ($n <= $limit && ($n % 12 == 1 || $n % 12 == 5)) {
					$isPrime[$n] ^= true;
				}

				$n = 3 * pow($i, 2) + pow($j, 2);

				if ($n <= $limit && $n % 12 == 7) {
					$isPrime[$n] ^= true;
				}

				$n = 3 * pow($i, 2) - pow($j, 2);

				if ($i > $j && $n <= $limit && $n % 12 == 11) {
					$isPrime[$n] ^= true;
				}
			}
		}

		for ($n = 5; $n <= $sqrt; $n++) {
			if ($isPrime[$n]) {
				$s = pow($n, 2);

				for ($k = $s; $k <= $limit; $k += $s) {
					$isPrime[$k] = false;
				}
			}
		}

		$primes[] = 2;
		$primes[] = 3;

		for ($i = 0; $i < $limit; $i++) {
			if ($isPrime[$i]) {
				$primes[] = $i;
			}
		}

		return $primes;
	}


	/**
	 * fakultät
	 * //TODO: test
	 * 2010-07-05 ms
	 */
	public static function factorial($num) {
		if ($num <= 1) {
			return 1;
		}
		return $num * self::factorial($num - 1);
	}

	public static function doubleFactorial($num) {
		//TODO
	}

	public static function multiFactorial($num, $fac) {
		//TODO
	}

	public static function superFactorial($num, $fac) {
		//TODO
	}

	public static function hyperFactorial($num, $fac) {
		//TODO
	}

	/**
	 * quersumme
	 * @param mixed $num (gets casted to int)
	 * @return int
	 * 2010-11-17 ms
	 */
	public static function crossTotal($num) {
		$num = preg_split('//', (String)(int)$num, -1, PREG_SPLIT_NO_EMPTY);
		$res = 0;
		foreach ($num as $char) {
			$res += (int)$char;
		}
		return $res;
	}

	/**
	 * Resolve The Ecuation Ax² + Bx + C = 0
	 * 2010-11-17 ms
	 */
	public static function equation($A, $B, $C) {
		//$Result = false;
		$Discriminant = pow($B, 2) - (4 * $A * $C);
		$RealPart = (0 - $B) / 2 * $A;
		$ImaginaryPart = (sqrt(0 - $Discriminant)) / 2 * $A;
		if ($Discriminant >= 0) {
			$X1 = (0 - $B + sqrt($Discriminant)) / 2 * $A;
			$X2 = (0 - $B - sqrt($Discriminant)) / 2 * $A;
			$Result = array($X1, $X2);
		}
		if ($Discriminant < 0) {
			$X1 = $RealPart + $ImaginaryPart;
			$X2 = $RealPart - $ImaginaryPart;
			$Result = array($X1, $X2);
		}
		return $Result;
	}

	/**
	 * @return True if the number is even, false otherwise
	 * 2010-11-17 ms
	 */
	public static function isEven($num) {
		if (($num % 2) === 0) {
			return true;
		}
		return false;
	}

/** other **/

	/**
	 * Benchmark Testing with recursive calls
	 * Careful: $n should not be above 3 (grows rapidly)
	 * //TODO: move to benchmark_lib?
	 * @see http://en.wikipedia.org/wiki/Ackermann_function
	 * @static
	 * 2010-07-05 ms
	 */
	public static function ackermann($n, $m) {
		if ($n == 0) {
			return $m + 1;
		} elseif ($m == 0) {
			return self::ackermann($n - 1, 1);
		} else {
			return self::ackermann($n - 1, self::ackermann($n, $m - 1));
		}
	}

}


