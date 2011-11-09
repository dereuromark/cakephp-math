<?php

/*
 * To test class.complex.php
 * $Id: testclasscomplex.php,v 1.2 2000/02/27 09:45:50 jmcastagnetto Exp $
 */

include ("../pkg.trig.php");
require ("../class.complex.php");

$a = new ComplexNumber(3,4);
$b = new ComplexNumber(1,2);

echo "Print a: ".$a->tostr()."\n";
echo "Print b: ".$b->tostr()."\n";
echo "abs(a): ".$a->abs()."  arg(a): ".$a->arg()."\n";
echo "real(a): ".$a->getreal()."  imag(a): ".$a->getim()."\n";
if (!$a->equal($a->negate())) {echo "a and neg(a) are different\n";}
$t=$a->negate();
echo "Neg(a) is ".$t->tostr()."\n";
$t=$a->conjugate();
echo "Conj(a) is ".$t->tostr()."\n";
$t=$a->sine();
echo "Sine(a) is ".$t->tostr()."\n";
$t=$a->cosine();
echo "Cosine(a) is ".$t->tostr()."\n";
$t=$a->tangent();
echo "Tangent(a) is ".$t->tostr()."\n";
echo "====\n";
$t=$a->mult($b);
echo "Print a*b: ".$t->tostr()."\n";
$t=$a->add($b);
echo "Print a+b: ".$t->tostr()."\n";
$t=$a->sub($b);
echo "Print a-b: ".$t->tostr()."\n";
$t=$b->sub($a);
echo "Print b-a: ".$t->tostr()."\n";
$t=$b->sub($a->conjugate());
echo "Print b-a': ".$t->tostr()."\n";
$v=$b->conjugate();
$t=$v->sub($a);
echo "Print b'-a: ".$t->tostr()."\n";
$v=$b->conjugate();
$t=$v->sub($a->conjugate());
echo "Print b'-a': ".$t->tostr()."\n";


