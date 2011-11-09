<?
/* Quicksort -Quicksort.php-

   Quicksort produces a sorted sequence of a array
   form index $start till index $end

   function Quick_sort sorted the input array directly.

   function QS_get gives a new array with a sorted
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
class Quicksort
{
	public function Quick_sort(&$array,$start,$end)
	{

        $middle=$array[floor(($start+$end)/2)];
        $i=$start;
        $j=$end;

        do
        {
                while ($array[$i]<$middle) $i++;
                while ($array[$j]>$middle) $j--;
                if ($i<=$j) 
                {
                        $temp=$array[$i]; $array[$i]=$array[$j]; $array[$j]=$temp;//switch
                        $i++; $j--;
                }
        } while ($i<=$j);


        if ($end<$j) $this->Quick_sort($array, $start, $j);
        if ($i<$end) $this->Quick_sort($array, $i, $end);

	}
	
	public function QS_get($array,$start,$end)
	{
		$temp=array();
		for($a=$start;$a<=$end;$a++)
		{
			$temp[]=$array[$a];
		}
		$this->Quick_sort($temp,0,count($temp)-1);
		return $temp;
	}	
}

