<?php
 /***************************************************
//* Cubic Equation Solver                           *
//* Version:	  1.0                               *
//* Release:      2010-10-12                        *
//* Author:       Intigam Mammadov                  *
//* Country:      Azerbaijan                        *
//* Contact:      php.mysql.pr@gmail.com            *
//* Copyright:    free for non-commercial use .     *
//* Any suggestion, request or bug, contact me!     *
//***************************************************/
/*This class calculates the roots of cubic equation with real coefficients.*/
class cubicequation
{
protected $a;
protected $b;
protected $c;
protected $d;
protected $x=array();
protected $xm=array();
protected $dec;
function __construct($a,$b,$c,$d,$dec)
{   
         $this->a=$a;
         $this->b=$b;
         $this->c=$c;
		 $this->d=$d;
         $this->dec=$dec;
		 //$this->roots();
}
protected function getP()
{        if($this->a!=0){
         $p=(3*$this->c/$this->a-($this->b*$this->b)/($this->a*$this->a))/3;
         return $p;
		 }
		 else{exit('Error: a = 0. This is no longer a cubic equation');
		 }
}//getP

protected function getQ()
{ 
         if($this->a!=0){
         $q=(2*pow($this->b,3)/pow($this->a,3)-(9*$this->b*$this->c)/pow($this->a,2)+27*$this->d/$this->a)/27;
         return $q;
		 }else{exit('Error: a = 0. This is no longer a cubic equation');
		 }
}//getQ

protected function getD()
{
         $d=pow($this->getQ()/2,2)+pow($this->getP()/3,3);
         return $d;
}//getD
//****************************************************************



protected function print1R2C()
{        printf("x1 = %10.".$this->dec."f;<br/>",$this->x[0]);
         if($this->xm[0]>0){
         printf("x2 = %10.".$this->dec."f&nbsp;+&nbsp;%10.".$this->dec."f*i;<br/>",$this->x[1],$this->xm[0]);
		 }
		 else{
		 printf("x2 = %10.".$this->dec."f-%10.".$this->dec."f*i;<br/>",$this->x[1],-$this->xm[0]);
         }
		 if($this->xm[1]>0){
         printf("x3 = %10.".$this->dec."f&nbsp;+&nbsp;%10.".$this->dec."f*i;<br/>",$this->x[2],$this->xm[1]);
		 }
		 else{
		 printf("x3 = %10.".$this->dec."f-%10.".$this->dec."f*i;<br/>",$this->x[2],-$this->xm[1]);
         }
}//print1R2C

protected function print3R()
{
         printf("x1 = %10.".$this->dec."f;<br/>",$this->x[0]);
         printf("x2 = %10.".$this->dec."f;<br/>",$this->x[1]);
         printf("x3 = %10.".$this->dec."f;<br/>",$this->x[2]);
 
}//print3R
//******************************************************************


public function roots()
{        if(abs($this->getP())+abs($this->getQ())+abs($this->getD())==0)
         {
         $d1=$this->d/$this->a;
		 if($d1>=0)
		 {
		 $this->x[0]=-pow($d1,1/3);
		 $this->x[1]=-pow($d1,1/3);
		 $this->x[2]=-pow($d1,1/3);
		 }
		 else{
		 $this->x[0]=-pow(-$d1,1/3);
		 $this->x[1]=-pow(-$d1,1/3);
		 $this->x[2]=-pow(-$d1,1/3);
		 }
		 $this->print3R();
		 exit;
         }
		 elseif($this->getD()<=0)
		 {
		 $u=sqrt(pow($this->getQ(),2)/4-$this->getD());//i
		 $v=pow($u,1/3);
		 $alpha=acos(-$this->getQ()/(2*$u));
		 $k1=-$v;
		 $m=cos($alpha/3);
		 $m1=sqrt(3)*sin($alpha/3);
		 $m2=-$this->b/(3*$this->a);
		 $this->x[0]=2*$v*$m-$this->b/(3*$this->a);
		 $this->x[1]=$k1*($m+$m1)+$m2;
		 $this->x[2]=$k1*($m-$m1)+$m2;
		 $this->print3R();
		 exit;
		 }else{
		 $s1=-$this->getQ()/2+sqrt($this->getD());
		 if($s1>0){
		 $s2=pow($s1,1/3);
		 }else{$s2=-pow(-$s1,1/3);}
		 $s3=-$this->getQ()/2-sqrt($this->getD());
		 if($s3>0){
		 $s4=pow($s3,1/3);
		 }else{$s4=-pow(-$s3,1/3);}
		 $this->x[0]=($s2+$s4)-$this->b/(3*$this->a);
		 $this->x[1]=-($s2+$s4)/2-$this->b/(3*$this->a);
		 $this->x[2]=-($s2+$s4)/2-$this->b/(3*$this->a);
		 $this->xm[0]=($s2-$s4)*sqrt(3)/2;
		 $this->xm[1]=-($s2-$s4)*sqrt(3)/2;
		 $this->print1R2C();
		 exit;
		 }
      
		 }//roots

}//cubicequation



