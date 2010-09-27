<?
include('Quicksort.php');
$QS=new Quicksort;
$array=array('8','10','2','1','1','6','5','5','3');

$part=$QS->QS_get($array,2,5);

for($i=0;$i<count($part);$i++)
		echo $part[$i]."\n";

echo "\n";

$QS->Quick_sort($array,0,count($array)-1);
for($i=0;$i<count($array);$i++)
		echo $array[$i]."\n";
?>