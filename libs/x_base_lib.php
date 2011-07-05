<?php

# x_base.php
# coded by uwe stein
#
# Copyright (C) 2010  Uwe Stein
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 3 of the License, or
# any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# x_base provides the possibility to convert numbers to/from each base
# by default the base-range  is limited from 2 up to 36
# this limit may change if there is used a different set of alnum-digits
# the max-value for base is the len of the string alnum_digit.


# using x_base may show funny results
# try the following decimal nummbers converted  into base 36
#     992128766
#     1952720019
#     676
#     10
#     765164

class XBaseLib {
	// class-members
	private $num; // the (n_base) value
	private $base; // the base
	private $dec_num; // the (decimal) value
	private $alnum_digit; // the used set of digits
	private $max_base; // the max possible base to convert


	// class functions
	public function __construct($num, $base = 10) {
		$this->alnum_digit = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // default use upper case letters
		$this->num = $num; //  the mumber encoded with base
		$this->base = $base; //  the used base
		$this->max_base = strlen($this->alnum_digit);
		$this->dec_num = $this->calc_dec($num); // dec_num always keeps the decimal-value of num


	}

	public function getNum() {
		return $this->num;
	} // returns the encoded value
	public function getDec() {
		return $this->dec_num;
	} // returns the decimal value
	public function getBase() {
		return $this->base;
	} // returns the used base
	public function getMaxBase() {
		return $this->max_base;
	} // returns the maximum-base
	public function toUpper() {
		$this->changeAlnumDigits("upper");
	} // use upper digits
	public function toLower() {
		$this->changeAlnumDigits("lower");
	} // use lower digits
	public function mixedDigits() {
		$this->changeAlnumDigits("mixed");
	} // use upper and lower digits
	// take Care!  -> a and A represent
	// different values while using mixed Digits

	// returns the stored number converted to base $base
	// does the same as getNum but doesnt change (restores)base or number
	public function getConvNum($base) {
		$tmp_num = $this->num;
		$tmp_base = $this->base;
		// dbg var_dump($this);
		$this->setBase($base);
		// dbg var_dump($this);
		$ret = $this->num;
		$this->num = $tmp_num;
		$this->base = $tmp_base;
		return $ret;
	}
	// change the base encoded number
	// param: $value ; the used base
	// return: none
	public function setNum($value, $base = 10) {
		$this->num = $value;
		$this->base = $base;
		$this->dec_num = $this->calc_dec($value);
	}
	// changes the base and builds the new encoded number using the new base
	public function setBase($base) {

		if ($base > strlen($this->alnum_digit) or $base < 2)
			die("<br><b>Invalid Base " . $value . "     Allowed Range = 2 - " . strlen($this->alnum_digit) . "</b>");

		if ($base != $this->base) {
			$this->base = $base;
			$this->build_nBase_number();
		}
	}

	private function calc_dec($number) {

		// nothing to do if base == 10
		if ($this->base == 10)
			return $number;
		$dec = 0;

		// walk through the num-string  (from right side)
		$t_num = strrev($number);
		for ($i = 0; $i < strlen($t_num); $i++) {
			// no check for allowed digits
			// the user has to keep an eye on valid digits
			// the position of the digit in $this->alnum_digit represents the decimal value first=1, scnd=1 ...
			$val = strpos($this->alnum_digit, $t_num[$i]);
			$dec += $val * (pow($this->base, $i));
		}
		//$this->dec_num = $dec;
		return $dec;
	}


	private function build_nBase_number() {
		$num = $this->get_highest_numPart($this->dec_num, $this->base);
		//dbg("erster Aufruf von get_highest...",$num);
		$rest = $this->dec_num - $this->calc_dec($num);
		while ($rest) {
			// get the next numPart
			$n_num = $this->get_highest_numPart($rest, $this->base);
			//dbg("schleifenaufruf  von get_highest...",$n_num);
			// get the remaining rest
			$rest -= $this->calc_dec($n_num);

			// "add the $n_num-string to the $num-string
			// check the length of $n_num  to find the position
			// and add the first digit of $n_num
			$a = strlen($n_num);
			$b = strlen($num);
			$num[$b - $a] = $n_num[0];
		}
		// arrived here, all should be done

		// store the value
		$this->num = $num;
	}
	// find the highest valid left digit ( filled with "0" )
	private function get_highest_numPart($dec_num, $base) {
		if ($dec_num == 0)
			return "0";
		$dec = 0;
		$pos = 0;
		$last_num = "";
		do {
			$num = "";
			// walk through the digits ( start with 1 because "0" would be returned )
			for ($i = 1; $i < $base; $i++) {
				// check the next digit
				$num = $this->alnum_digit[$i];
				// add digits if $num has 2 ore more  ( add "0" on right side )
				for ($n = 0; $n < $pos; $n++)
					$num .= "0";
				// first get the decimal-value
				$dec = $this->calc_dec($num);
				// then check wether $num is smaller or equal to dec_num
				// equal? then return
				if ($dec == $dec_num)
					return $num;
				// smaller?  then save the current num and continue
				if ($dec < $dec_num) {
					$last_num = $num;
				}
				// hihger ? then return the last valid num
				if ($dec > $dec_num) {
					return $last_num;
				}

			}
			// arrived here,  add 1 more digit ( add a "0" at right position )
			$pos++;
		} while ($dec < $dec_num);
	}
	private function changeAlnumDigits($uc) {
		switch ($uc) {
			case "upper":
				$this->alnum_digit = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				break;
			case "lower":
				$this->alnum_digit = "0123456789abcdefghijklmnopqrstuvwxyz";
				break;
			case "mixed":
				$this->alnum_digit = "01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
				break;
			default:
				die("Invalid Param " . $uc . " in Function changeAlnumDigits");
		}
		$this->max_base = strlen($this->alnum_digit);
		// rebuild the nBase_numer
		$this->build_nBase_number();
	}
} // End of class



