<?php
/*
 * ComplexNumber class w/ methods to manipulate it and testing code
 * (c) Jesus M. Castagnetto 1999,2000.
 *
 * $Id: class.complex.php,v 1.3 2000/02/27 09:46:37 jmcastagnetto Exp $
 */

// this class requires pkg.trig.php

class ComplexNumber {

	public $real;
	public $im;
	
	public function ComplexNumber($r, $i) {
		$this->real = $r;
		$this->im = $i;
	}
	
	public function tostr() {
		return ($this->real." + ".$this->im."j");
	}

	public function tohtml() {
		return ("<CODE>".$this->real." + ".$this->im."<B>j</B></CODE>");
	}
	
	public function conjugate() {
		return new ComplexNumber($this->real, -1 * $this->im);
	}
	
	public function negate() {
		return new ComplexNumber(-1 * $this->real, -1 * $this->im);
	}

	public function inverse() {
		$r = $this->real/(pow($this->real,2) + pow($this->im,2));
		$i = $this->im/(pow($this->real,2) + pow($this->im,2));
		return new ComplexNumber ($r, $i);
	}

	public function abs() {
		$r = $this->real; $i = $this->im;
		return sqrt($r*$r + $i*$i);
	}
	
	public function arg() {
		$r = $this->real; $i = $this->im;
		return atan($i/$r);
	}

	public function angle() {
		return $this->arg();
	}

	public function getreal() {
		return $this->real;
	}

	public function getim() {
		return $this->im;
	}

	public function sine() {
		$a = $this->real; $b = $this->im;
		$r = sin($a)*cosh($b);
		$i = cos($a)*sinh($b);
		return new ComplexNumber( $r, $i );
	}

	public function cosine() {
		$a = $this->real; $b = $this->im;
		$r = cos($a)*cosh($b);
		$i = sin($a)*sinh($b);
		return new ComplexNumber( $r, $i );
	}

	public function tangent() {
		$a = $this->real; $b = $this->im;
		$den = 1 + pow(tan($a),2)*pow(tanh($b),2);
		$r = pow(sech($b),2)*tan($a)/$den;
		$i = pow(sec($a),2)*tanh($b)/$den;
		return new ComplexNumber( $r, $i );
	}	

	public function equal ($c2) {
		return ( $this->real == $c2->real and $this->im == $c2->im );
	}

	// methods below need a valid ComplexNumber object as parameter

	public function add ($c2) {
		return 	new ComplexNumber( $this->real + $c2->real, $this->im + $c2->im);
	}

	public function sub ($c2) {
		return $this->add($c2->negate());
	}

	public function mult ($c2) {
		$r = ($this->real * $c2->real) - ($this->im * $c2->im);
		$i = $this->im + $c2->im;
		return new ComplexNumber( $r, $i );
	}

	public function div ($c2) {
		$a = $this->real; $b = $this->im;
		$c = $c2->real; $d = $c2->im;
		$r = ($a*$c + $b*$d)/($c*$c + $d*$d);
		$i = ($b*$c - $a*$d)/($c*$c + $d*$d);
		return new ComplexNumber( $r, $i );
	}

} /* end of ComplexNumber class */

?>

