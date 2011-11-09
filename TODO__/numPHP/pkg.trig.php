<?php

/*
* Complement trigonometric functions
* (c) Jesus M. Castagnetto 1999,2000.
*
* $Id: pkg.trig.php,v 1.1.1.1 2000/02/27 08:35:56 jmcastagnetto Exp $
*/

function sec($x) {
	return 1 / cos($x);
}

function csc($x) {
	return 1 / sin($x);
}

function cot($x) {
	return 1 / tan($x);
}

/* Hyperbolic functions */


function csch($x) {
	return 1 / sinh($x);
}

function sech($x) {
	return 1 / cosh($x);
}

function coth($x) {
	return cosh($x) / sinh($x);
}

/* Inverse hyperbolic functions */

function arcsinh($x) {
	return log($x + sqrt($x * $x + 1));
}

function arccosh($x, $sign = 1) {
	return log($x + $sign * sqrt($x * $x - 1));
}

function arctanh($x) {
	return 0.5 * log((1 + $x) / (1 - $x));
}

function arccsch($x) {
	return log((1 + sqrt(1 + $x * $x)) / $x);
}

function arcsech($x, $sign = 1) {
	return log((1 + $sign * sqrt(1 - $x * $x)) / $x);
}

function arccoth($x) {
	return 0.5 * log(($x + 1) / ($x - 1));
}

