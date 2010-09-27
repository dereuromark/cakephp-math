<?php

/**
 * common math algorythms
 * 2010-07-05 ms
 */
class MathLib {

	/**
	 * Benchmark Testing with recursive calls
	 * Careful: $n should not be above 3 (grows rapidly)
	 * //TODO: move to benchmark_lib?
	 * @see http://en.wikipedia.org/wiki/Ackermann_function
	 * @static
	 * 2010-07-05 ms
	 */
	function ackermann($n, $m) {
		if ($n == 0) {
			return $m + 1;
		} elseif ($m == 0) {
			return self::ackermann($n - 1, 1);
		} else {
			return self::ackermann($n - 1, self::ackermann($n, $m - 1));
		}
	}

	/**
	 * //TODO: return array with composite prime numbers instead of false?
	 * (Maybe in own class Composite Factoring)
	 * //FIXME!!! O(n^2) to O(log n)?
	 * 2010-07-05 ms
	 */
	function isPrime($number) {
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
		for($CurrNum = 2; $CurrNum <= $number; $CurrNum++) {
                for($Divisor = 2; $Divisor < $CurrNum; $Divisor++)
                {
                        $Res = $CurrNum / $Divisor;
                        if($Res != 1 && intval($Res) == $Res)
                        {
                                $No = 1;
                                $Divisor = $CurrNum;
                        }
                }
                if($No != 1)
                {
                        $Result = $CurrNum;
                }
                $No = 0;
    }
    // If the only divisor is the number itself, it's prime
		if($Result == $number) {
    	return true;
    }
		return false;
	}

	/**
	 * fakultät
	 * //TODO: test
	 * 2010-07-05 ms
	 */
	function factorial($num) {
		if ($num <= 1) {
			return 1;
		}
		return $num * self::factorial($num - 1);
	}
	
	function doubleFactorial($num) {
		//TODO
	}
	
	function multiFactorial($num, $fac) {
		//TODO
	}

	function superFactorial($num, $fac) {
		//TODO
	}
	
	function hyperFactorial($num, $fac) {
		//TODO
	}
	
}

?>