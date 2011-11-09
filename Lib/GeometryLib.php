<?php

/**
 * 
 * 2010-07-05 ms
 */
class GeometryLib {


	/**
	 *
	 * @param int $a
	 * @param int $b
	 * @return float $c
	 * @access public
	 * @author deltacahos
	 */
	public function pythagoras($a, $b) {
		return (float)sqrt(pow($a, 2) + pow($b, 2));
	}

	
	/**
	 * distance between two points (x1, y1) and (x2, y2)
	 * @link http://en.wikipedia.org/wiki/Analytic_geometry
	 * 2010-09-27 ms
	 */
	public function distance($x1, $y1, $x2, $y2) {
		return $this->pythagoras($x2 - $x1, $y2 - $y1);
	}

	/**
	 * The larger the absolute value of a slope, the steeper the line. A horizontal line has slope 0, a 45° rising line has a slope of +1, and a 45° falling line has a slope of -1. A vertical line's slope is undefined meaning it has "no slope."
	 * @return 0..1 or 0..-1
	 * 2010-09-27 ms
	 */
	public function slope($x1, $y1, $x2, $y2) {
		# prevent division by zero
		if ($x2 == $x1) {
			if ($y2 > $y1) {
				return 1;
			}
			if ($y2 < $y1) {
				return -1;
			}
			return 0; 
		}
		return ($y2-$y1)/($x2-$x1);
	}
	
	//TODO:  not angle right now, but 0..1 - should later be 0..90 or 0..-90
	public function slopeAngle($x1, $y1, $x2, $y2) {
		return atan($this->slope($x1, $y1, $x2, $y2));
	}
	
	public function circumferenceOfCircle($radius) {
		return 2 * M_PI * $radius;
	}
	
	public function circumferenceOfRectangle($width, $height) {
		return 2 * ($width + $height);
	}
	
	public function circumferenceOfTriangle($a, $b, $c) {
		return $a + $b + $c;
	}
	
	# assuming the triangle is at least isosceled (gleichschenklig)
	public function circumferenceOfTriangleByHeight($width, $height) {
		return $width + 2 * $this->pythagoras($width/2, $height);
	}
	
	public function areaOfCircle($radius) {
		return M_PI * pow($radius, 2);
	}
	
	public function areaOfRectangle($width, $height) {
		return $width * $height;
	}
	
	/**
	 * alternative: maybe faster with Heronsche Flaechenformel?
	 * @return float $area
	 */
	public function areaOfTriangle($a, $b, $c) {
		//TODO: return false if invalid triangle!
		$height = $this->heightOfTriangle($a, $b, $c, 'a');
		return 0.5 * $a * $height;
	}
	
	/**
	 * @param width
	 * @param corresponding height (needs to be orthogonal)
	 * @return float $area
	 */
	public function areaOfTriangleByHeight($width, $height) {
		return 0.5 * $width * $height;
	}
	
	/**
	 * @param a, b, c 
	 * @param null or string a,b,c
	 * @return return array(a=>,b=>,c=>) or float $specificHeight or false in failure
	 */
	public function heightOfTriangle($a, $b, $c, $returnHeight = null) {
		if ($a == 0 || $b == 0 || $c == 0) {
			return false;
		}
		$basicRoot = sqrt(2*($a^2*$b^2 + $b^2*$c^2 + $c^2*$a^2)-($a^4 + $b^4 + $c^4));
		
		$ha = $basicRoot / (2*$a);
		if ($returnHeight == 'a') {
			return $ha;
		}
		$hb = $basicRoot / (2*$b);
		if ($returnHeight == 'b') {
			return $hb;
		}
		$hc = $basicRoot / (2*$c);
		if ($returnHeight == 'c') {
			return $hc;
		}
		return array('a'=>$ha, 'b'=>$hb, 'c'=>$hc);	
	}

	
	/**
	 * sum of all angles in an object
	 * Die Winkelsumme im (nicht überschlagenen) n-Eck ist (n-2)*180°.
	 * @return int $sum
	 * 2010-09-27 ms
	 */
	public function angleSum($corners) {
		if ($corners < 2) {
			return false;
		}
		//TODO: check überschlagen?
		return ($corners-2)*180;
	}
		
}


