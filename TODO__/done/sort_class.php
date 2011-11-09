<?php
/*
** Class Descriptions

** This class contains three methods of well known sorting algorithms.
** These are Merge,Shell and Bublle sorting algorithms.and soon add it Quick sort

** Usage: simply instantiate from this class and call your favoriate method.

** Methods name and parameters:
**    BubbleSort($sort_array,$reverse) that gets two parameter : the array name that you wish to sort it and order of sorting. if reverse be true this method sorts array in Descending order.
**    shellsort($elements) that gets only one  parameter: the array name you want to sort.
**    MergeSort($Elements1,$Elements2) that Elements1 is the first sorted array name and Element2 is second sorted array name.

** You can feel free to change this class in any way that meet your needs.
** I will be glad to recieve any comment or suggestion and specialy from recieving any bug reported.
** Please notify me these with m_maldar@yahoo.co.uk

*/

class sort{

function MergeSort($Elements1,$Elements2){

//initialize of counters
    $i=$j=$p=0;
 $len1=count($Elements1);
 $len2=count($Elements2);
//Merging two array note that $Elements1 and $Elements2 have sorted elements.
    while($i<$len1 and $j<$len2)
        if ($Elements1[$i]<=$Elements2[$j])
                  $SortedList[$p++]=$Elements1[$i++];
        else   $SortedList[$p++]=$Elements2[$j++];
// Merging remain elements of array which has greater length
    if($len1>$len2)
         for($t=$i;$t<$len1;$t++)
               $SortedList[$p++]=$Elements1[$t];
    else
        for($t=$j;$t<$len2;$t++)
               $SortedList[$p++]=$Elements2[$t];
// return result of merging
    return $SortedList;
}//end function

//********************************************************************

 function shellsort($elements){
  $k=0;
  $length=count($elements);
  $gap[0]=(int) ($length / 2);
  while($gap[$k]>1){
    $k++;
    $gap[$k]=(int)($gap[$k-1]/2);
  }//end while
  for($i=0;$i<=$k;$i++){
    $step=$gap[$i];
    for($j=$step;$j<$length;$j++){
      $temp=$elements[$j];
      $p=$j-$step;
      while($p>=0 && $temp<$elements[$p]){
        $elements[$p+$step]=$elements[$p];
        $p=$p-$step;
        }//end while
      $elements[$p+$step]=$temp;
    }//endfor j
  }//endfor i
  return $elements;
}// end function

//********************************************************************

function BubbleSort($sort_array,$reverse)
{
  $length=count($sort_array);
  for ($i = 0; $i < $length ; $i++){
    for ($j = $i + 1; $j < $length ; $j++){
      if($reverse){
        if ($sort_array[$i] < $sort_array[$j]){
          $tmp = $sort_array[$i];
          $sort_array[$i] = $sort_array[$j];
          $sort_array[$j] = $tmp;
        }//endif
      }//end if($reverse)
      else{
        if ($sort_array[$i] > $sort_array[$j]){
          $tmp = $sort_array[$i];
          $sort_array[$i] = $sort_array[$j];
          $sort_array[$j] = $tmp;
        }//endif
      }//endelse
    }//endfor j
  }//endfor i
  return $sort_array;
}//end function

//********************************************************************

}//end class


