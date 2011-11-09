<?
/* Mergesort -Mergesort.php-

   Mergesort produces a sorted sequence of a array
   form index $start till index $end

   function Merge_sort sorted the input array directly.

   function MS_get gives a new array with a sorted
   sequence of the input array and leave the input
   array unchanged.
   
   Version 0.1b
   Last change: 2002/09/07

   copyrigth 2002 Email Communications, http://www.emailcommunications.nl/
   written by Bas Jobsen (bas@startpunt.cc)

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2, or (at your option)
   any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software Foundation,
   Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
*/

class Mergesort
{

	public function Merge_sort(&$array,$start,$end)
	{
		if($start<$end)
		{ 
        $half=floor(($start+$end)/2);
		$this->Merge_sort($array,$start,$half);
		$this->Merge_sort($array,$half+1,$end);
		$this->Merge($array,$start,$end,$half);
		}	
	}



	public function Merge(&$array,$start,$end,$half)
	{

    $length=$end-$start+1; 
    $temp=array();


    $k=0;

    for ($i=$start; $i<=$half; $i++)
        $temp[$k++]=$array[$i];
   
    for ($j=$end; $j>=$half+1; $j--)
        $temp[$k++]=$array[$j];

    $i=0; $j=$length-1; $k=$start;

    while ($i<=$j)
        if ($temp[$i]<=$temp[$j])
            $array[$k++]=$temp[$i++];
        else
        	$array[$k++]=$temp[$j--];

	}

	public function MS_get($array,$start,$end)
	{
		$temp=array();
		for($a=$start;$a<=$end;$a++)
		{
			$temp[]=$array[$a];
		}	
		$this->Merge_sort($temp,0,count($temp)-1);
		return $temp;
	}
	
}

