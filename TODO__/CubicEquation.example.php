<?php
require_once "CubicEquation.class.php";
?>
<html>
<head>
<title>Quadratic Equation Solver</title>
</head>
<body style="background:#2F4F2F;">
<table border="1" align="center" style="width:800px;margin-top:60px;font-size:1.4em">
<tr><td style="background:#CFD784;text-align:center;height:50px;">
<h2>Equation Solver for  ax<sup>3</sup>+bx<sup>2</sup>+cx+d = 0</h2>
</td></tr><tr>
<td valign="top" style="background:#E0EEE0;padding-left:20px;padding-top:10px;height:350px;line-height:150%;">
<form method="POST" action="">
a = <input type="text" name="a" value="1" maxlength="10" size="8">
 &nbsp;&nbsp;&nbsp; b= <input type="text" name="b" value="2"  maxlength="10" size="8">
&nbsp;&nbsp;&nbsp; c = <input type="text" name="c" value="1" maxlength="10" size="8">
&nbsp;&nbsp;&nbsp; d = <input type="text" name="d" value="1" maxlength="10" size="8"><br/>
&nbsp;Significant Figures: <input type="text" name="dec" value="6" maxlength="2" size="2">
<input type="hidden" name="seen" value="t">
&nbsp;<input type="submit" value="Calculate">
</form><br/>


<?php
if(isset($_POST['a'])){
$a=$_POST['a'];
if(empty($a)){$a=0;}
$b=$_POST['b'];
if(empty($b)){$b=0;}
$c=$_POST['c'];
if(empty($c)){$c=0;}
$d=$_POST['d'];
if(empty($d)){$d=0;}
$dec=$_POST['dec'];
}else{
$a=1; $b=2; $c=1;$d=1;$dec=6;
}
$e=new CubicEquation($a,$b,$c,$d,$dec);
echo "a = ".$a.";&nbsp;&nbsp;&nbsp;&nbsp; b = ".$b;
echo "&nbsp;&nbsp;&nbsp;&nbsp; c = ".$c;
echo ";&nbsp;&nbsp;&nbsp;&nbsp; d = ".$d.".<br/><hr/>";
$e->roots();


?>
</td></tr></table>
</body>
</html>

