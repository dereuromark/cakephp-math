<?php

/**
 * 2009-07-15 ms
 */
class MatrixLib {

	public $matrix = null;
	
	public $m = 0;
	public $n = 0;
	
	public $error = '';

	public function __construct($array = null) {
		if ($array !== null) {
			$this->set($array);
		}
	}
	
	public function set($array, $clean = true) {
		# clean first (cast all values to float)
		if ($clean) {
			$array = $this->clean($array);
		}
		$this->matrix = $array;
	}
	
	public function get() {
		return $this->matrix;
	}
	
	/**
	 * @return void
	 */
	public function clean($array) {
		if (!is_array($array)) {
			return (float)$array;
		}
		foreach ($array as $key => $a) {
			$array[$key] = $this->clean($a);
		}
		return $array;
	}
	
	/**
   * Returns the Euclidean norm of the matrix.
   * Euclidean norm = sqrt( sum( e[i][j]^2 ) )
   * 2010-10-19 ms
   */
	public function norm() {
		//TODO
	}
	
	
	public function swapRows($i, $j) {
		
	}
	
	public function swapCols($i, $j) {
		
	}
	
	public function getMinimum($i = null, $j = null) {
		
	}
	
	public function getMaximum($i = null, $j = null) {
		
	}
	
	
	/**
	 * M^T
	 */
	public function transpose() {
		$m = count($this->matrix);
		$n = count($this->matrix[0]);
		$matrix = array();
		for ($i = 0; $i < $m; $i++) {		
			for ($j = 0; $j < $n; $j++) {
				$matrix[$j][$i] = $this->matrix[$i][$j];
			}
		}
		$this->matrix = $matrix;
		return true;
	}
	
	
	/**
	 * M^-1
	 * only for some quadratic matrices - if:
	 * M * M^-1 = E
	 * Gauß-Jordan-Algorithmus (Blockmatrix) or with Adjunkte (and adjunct and determinante): (1/det(M))*adj(M)
	 * @return bool $success
	 */
	public function inverse() {
		if ($this->m !== $this->n) {
			return false;
		}
		// ( 1 / det(A) ) *	adj(A)
		$det = $this->determinant();
		if (!$det) {
			return false;
		}
		//return (1/$det)*$this->adjugate();
		
		return true;
	}
	
	/** 
	 * plays a role similar to the inverse of a matrix; it can however be defined for any square matrix without the need to perform any divisions
 	 * Adjunkte
 	 * @link http://de.wikipedia.org/wiki/Adjunkte
	 */
	public function adjugate() {
		//TODO
		
		return 0;
	}
	
	/**
	 * Adjungierte
	 * or adjoint (but that terminology is ambiguous)
	 */
	public function conjugateTranspose() {
		
	}
	

	public function isQuadratic() {
		if (count($this->matrix[0]) === count($this->matrix)) {
			return true;
		}
		return false;
	}
	
	/**
	 * only for n*n matrices
	 * $n: exponent; defaults to 2 (A^2 = A*A)
	 */
	public function exponent($n = 2) {
		if (!$this->isQuadratic()) {
			return false;
		}
		for ($n = 1; $n < 2; $n++) {
			$this->matrix = $this->multiply($this->matrix);
		}
		return true;
	}
	
	/**
	 * sum of diag elements
	 * alias Spur
	 * 2010-09-26 ms
	 */
	public function getTrace() {
		$sum = 0;
		list($m, $n) = $this->dimension();
		if ($m !== $n) {
			return false;
		}	
			
		for ($i = 0; $i < $m; $i++) {
			$sum += $this->matrix[$i][$i];
		}
		
		return $sum;
	}
	
	/**
	 * possible if base A^n exists with eigenvalues of A
	 * 2010-09-27 ms
	 */
	public function isDiagonalizable() {
		//TODO
	}
	
	
	/**
	 * with gauß alg
	 * i.g.: degree of rows = degree of columns
	 * 2010-09-16 ms
	 */
	public function getDegree() {
		//TODO
	}
	
	/**
	 * a) All nonzero rows (rows with at least one nonzero element) are above any rows of all zeroes, and
	 * b) The leading coefficient (the first nonzero number from the left, also called the pivot) of a nonzero row is always strictly to the right of the leading coefficient of the row above it.
	 * 2010-09-16 ms
	 */
	public function isRowEchelonForm() {
		
	}
	
	public function isReducedRowEchelonForm() {
		
	}

	public function rowEchelonForm() {
		return $this->reducedRowEchelonForm();
/*
		public function ToReducedRowEchelonForm(Matrix M) is
    lead := 0
    rowCount := the number of rows in M
    columnCount := the number of columns in M
    for 0 = r < rowCount do
        if columnCount = lead then
            stop function
        end if
        i = r
        while M[i, lead] = 0 do
            i = i + 1
            if rowCount = i then
                i = r
                lead = lead + 1
                if columnCount = lead then
                    stop function
                end if
            end if
        end while
        if i ? r then Swap rows i and r
        Divide row r by M[r, lead]
        for 0 = i < rowCount do
            if i ? r do
                Subtract M[i, lead] multiplied by row r from row i
            end if
        end for
        lead = lead + 1
    end for
	end function
*/
	}
	
	public function reducedRowEchelonForm() {
		$matrix = $this->matrix;
				
		$lead = 0;
    $rowCount = count($matrix);
    if ($rowCount == 0)
        return;
    $columnCount = 0;
    if (isset($matrix[0])) {
        $columnCount = count($matrix[0]);
    }
    for ($r = 0; $r < $rowCount; $r++) {
        if ($lead >= $columnCount)
            break;        {
            $i = $r;
            while ($matrix[$i][$lead] == 0) {
                $i++;
                if ($i == $rowCount) {
                    $i = $r;
                    $lead++;
                    if ($lead == $columnCount)
                        return;
                }
            }
            $temp = $matrix[$r];
            $matrix[$r] = $matrix[$i];
            $matrix[$i] = $temp;
        }        {
            $lv = $matrix[$r][$lead];
            for ($j = 0; $j < $columnCount; $j++) {
                $matrix[$r][$j] = $matrix[$r][$j] / $lv;
            }
        }
        for ($i = 0; $i < $rowCount; $i++) {
            if ($i != $r) {
                $lv = $matrix[$i][$lead];
                for ($j = 0; $j < $columnCount; $j++) {
                    $matrix[$i][$j] -= $lv * $matrix[$r][$j];
                }
            }
        }
        $lead++;
    }
    $this->matrix = $matrix;
    return $matrix;
	}
	
	public function gaussianElimination() {
/*
i := 1
j := 1
while (i = m and j = n) do
  Find pivot in column j, starting in row i:
  maxi := i
  for k := i+1 to m do
    if abs(A[k,j]) > abs(A[maxi,j]) then
      maxi := k
    end if
  end for
  if A[maxi,j] ? 0 then
    swap rows i and maxi, but do not change the value of i
    Now A[i,j] will contain the old value of A[maxi,j].
    divide each entry in row i by A[i,j]
    Now A[i,j] will have the value 1.
    for u := i+1 to m do
      subtract A[u,j] * row i from row u
      Now A[u,j] will be 0, since A[u,j] - A[i,j] * A[u,j] = A[u,j] - 1 * A[u,j] = 0.
    end for
    i := i + 1
  end if
  j := j + 1
end while
*/
	}
	
	
	/**
	 * If the action of a matrix on a (nonzero) vector changes its magnitude but not its direction, then the vector is called an eigenvector of that matrix
	 * So if A is a linear transformation, a non-null vector x is an eigenvector of A if there is a scalar ? such that
	 * Ax = ?x
	 * The scalar ? is said to be an eigenvalue of A corresponding to the eigenvector x
	 */
	public function getEigenvectors($eigenvalue = null) {
		//TODO
	}
	
	/**
	 * Each eigenvector is, in effect, multiplied by a scalar, called the eigenvalue corresponding to that eigenvector
	 */
	public function getEigenvalues() {
		//TODO
	}
	
	/**
	 * all besides the main diag are equal
	 */
	public function isSymmetric() {
		$size = count($this->matrix);
		if (count($this->matrix[0]) !== $size) {
			return false;
		}
		//return $this->inverse($matrix) === $matrix;
		for ($i = 0; $i < $size; $i++) {		
			for ($j = 0; $j < $size; $j++) {
				# main diagnoal? 1 - otherwise 0
				if ($j === $i) {
					continue;
				}
				if ($this->matrix[$i][$j] !== $this->matrix[$j][$i]) {
					return false;
			 	}
			}
		}
		return true;
	}
	
	/**
	 * all besides the main diag are equal, but different
	 * A = -AT 
	 */
	public function isSkewSymmetric() {
		$size = count($this->matrix);
		if (count($this->matrix[0]) !== $size) {
			return false;
		}
		for ($i = 0; $i < $size; $i++) {		
			for ($j = 0; $j < $size; $j++) {
				# main diagnoal? 1 - otherwise 0
				if ($j === $i) {
					continue;
				}
				if ($this->matrix[$i][$j] !== -$this->matrix[$j][$i]) {
					return false;
			 	}
			}
		}
		return true;
	}
	
	public function isPositiveDefinite() {
		//TODO
	}
	
	
	/**
	 * assumes the most right column is b^T
	 * is solvable if Rg(A) = Rg(A | b^T)
	 * 2010-09-16 ms
	 */
	public function isSolvable() {
		
		# for quaadratic matrices: det A != 0
		if (($x = $this->determinant()) !== false) {
			return $x !== 0;
		}
		return false;
	}
	
	/**
	 * identity matrix or unit matrix of size n is the n-by-n square matrix with ones on the main diagonal and zeros elsewhere
	 * 2010-09-16 ms
	 */
	public function getIdentityMatrix($size = null) {
		if ($size === null) {
			$size = count($this->matrix);
			if (count($this->matrix[0]) !== $size) {
				return false;
			}
		}
		$array = array();
		for ($i = 0; $i < $size; $i++) {		
			for ($j = 0; $j < $size; $j++) {
				# main diagnoal? 1 - otherwise 0
				if ($i === $j) {
					$array[$i][$j] = 1;
				} else {
					$array[$i][$j] = 0;
				}
			}
		}
		return $array;
	}
	
	/**
   * Returns the diagonal of a square matrix as a vector array
   * @return array
   * 2010-10-19 ms
   */
	public function getDiagonal() {
		$vals = array();
		$n = count($this->matrix);
		for ($i=0; $i<$n; $i++) {
			$vals[$i] = $this->matrix[$i][$i];
		}
		return $vals;
	}
	
	/**
   * Returns a simple string representation of the matrix
   *
   * @param optional string $format a sprintf() format used to print the matrix elements (default = '%6.2f')
   * @return string|PEAR_Error a string on success, PEAR_Error otherwise
   */
	public function toString ($format='%6.2f') {	
    $out = "";
    for ($i=0; $i < count($this->matrix); $i++) {
        for ($j=0; $j < count($this->matrix[0]); $j++) {
            // remove the -0.0 output
            $entry =  $this->_data[$i][$j];
            if (sprintf('%2.1f',$entry) == '-0.0') {
                $entry = 0;
            }
            $out .= sprintf($format, $entry);
        }
        $out .= "\n";
    }
    return $out;
	}
	

	/**
	 * @return array: 0=>M, 1=>N
	 * 2010-09-15 ms
	 */
	public function dimension($dir = null, $matrix = null) {
		if ($matrix === null) {
			$matrix = $this->matrix;
		}
		$m = count($matrix);
		$n = count($matrix[0]);
		
		$this->m = $m;
		$this->n = $n;
		
		if ($dir == 'm') {
			return $m;
		}
		if ($dir == 'n') {
			return $n;
		}
		return array($m, $n);
	}

	/**
	 * scale array
	 * float value or second matrix
	 * @return bool $success
	 * 2010-09-15 ms
	 */
	public function multiply($value) {
		list($m, $n) = $this->dimension();
		
		if (is_array($value)) {
			if (count($value) != $n || count($value[0]) != $m) {
				return false;
			}
			# add both matrixes
			for ($i = 0; $i < $m; $i++) {		
				for ($j = 0; $j < $n; $j++) { 
					$this->matrix[$i][$j] *= $value[$j][$i];
				}
			}
			return true;	
		}
		# add skalar
		for ($i = 0; $i < $m; $i++) {		
			for ($j = 0; $j < $n; $j++) { 
				$this->matrix[$i][$j] *= $value;
			}
		}
		return true;
	}
	
	/**
	 * scale a single row of the matrix
	 * 2010-10-19 ms
	 */
	public function scaleRow($row, $factor) {
		
	}

	/**
	 * scale a single column of the matrix
	 * 2010-10-19 ms
	 */
	public function scaleColumn($column, $factor) {
		
	}

	
	/**
	 * float value
	 * @return bool $success
	 */
	public function divide($value) {
		if ($value == 0) {
			return false;
		}
		list($m, $n) = $this->dimension();
		for ($i = 0; $i < $m; $i++) {		
			for ($j = 0; $j < $n; $j++) { 
				$this->matrix[$i][$j] /= $value;
			}
		}
		return true;
	}
	
	/**
	 * float value or second matrix 
	 * @return bool $success
	 */
	public function add($value) {
		list($m, $n) = $this->dimension();
		
		if (is_array($value)) {
			if (count($value) != $n || count($value[0]) != $m) {
				return false;
			}
			# add both matrixes
			for ($i = 0; $i < $m; $i++) {		
				for ($j = 0; $j < $n; $j++) { 
					$this->matrix[$i][$j] *= $value[$j][$i];
				}
			}
			return true;	
		}
		# add skalar
		for ($i = 0; $i < $m; $i++) {		
			for ($j = 0; $j < $n; $j++) { 
				$this->matrix[$i][$j] += $value;
			}	
		}
		return true;
	}

	
	/**
	 * Multiplies a vector by this matrix
	 * 
	 * @param array
	 * 2010-10-19 ms
	 */
	public function vectorMultiply($v1, $matrix = null) {
		if ($matrix === null) {
			$matrix = $this->matrix;
		}
		
		//TODO
		
		return $v1;
	}
	
 /**
   * Solves a system of linear equations: Ax = b
   *
   * A system such as:
   * <pre>
   *     a11*x1 + a12*x2 + ... + a1n*xn = b1
   *     a21*x1 + a22*x2 + ... + a2n*xn = b2
   *     ...
   *     ak1*x1 + ak2*x2 + ... + akn*xn = bk
   * </pre>
   * can be rewritten as:
   * <pre>
   *     Ax = b
   * </pre>
   * where:
   * - A is matrix of coefficients (aij, i=1..k, j=1..n),
   * - b a vector of values (bi, i=1..k),
   * - x the vector of unkowns (xi, i=1..n)
   * Using: x = (Ainv)*b
   * where:
   * - Ainv is the inverse of A
   *
   * @param object Math_Matrix $a the matrix of coefficients
   * @param object Math_Vector $b the vector of values
   * @return object Math_Vector|PEAR_Error a Math_Vector object on succcess
   * @see vectorMultiply()
   */
  function solve($b, $a = null) {
  	if ($a === null) {
  		$a = $this->matrix;
  	}
  	return $this->vectorMultiply($b, $a);
	}
	

	public function permanent() {
		list($m, $n) = $this->dimension();
		$case = $m.'x'.$n;
		
		$array = $this->matrix;
		
		
		switch ($case) {
			
			case '1x1':
				return $array[0][0];
				break;
			case '2x2':
				return $array[0][0]*$array[1][1] + $array[0][1]*$array[1][0];
			case '3x3':
				return $array[0][0]*$array[1][1]*$array[2][2] + $array[0][1]*$array[1][2]*$array[2][0] + $array[0][2]*$array[1][0]*$array[2][1]
				+ $array[0][0]*$array[1][2]*$array[2][1] + $array[0][1]*$array[1][0]*$array[2][2] + $array[0][2]*$array[1][1]*$array[2][0];
				break;
			
			//are computed differently! Laplace’scher Entwicklungssatz!
			default:
		}
		
		return false;
	}


	/**
   * Returns the normalized determinant = abs(determinant)/(euclidean norm)
   *
   * @return number
   */
	public function normalizedDeterminant() {
	
	}
	

	/**
	 * only defined for MxN with N=M!
	 * @see http://www.arndt-bruenner.de/mathe/scripts/det.js for formula
	 * 2010-09-21 ms
	 */
	public function determinant() {
		list($m, $n) = $this->dimension();
		$case = $m.'x'.$n;
		
		$array = $this->matrix;
		
		switch ($case) {
			case '1x1':
				return $array[0][0];
			case '2x2':
				return $array[0][0]*$array[1][1] - $array[0][1]*$array[1][0];
			case '3x3':
				return $array[0][0]*$array[1][1]*$array[2][2] + $array[0][1]*$array[1][2]*$array[2][0] + $array[0][2]*$array[1][0]*$array[2][1]
				- $array[0][0]*$array[1][2]*$array[2][1] - $array[0][1]*$array[1][0]*$array[2][2] - $array[0][2]*$array[1][1]*$array[2][0];
			case '3x3': # alternativly
				$res = 0;
				
				# plus
				$x = 0;
				$y = 0;
				for ($i = 0; $i < $m; $i++) {
					$tmp = 1;
					
					for ($j = 0; $j < $m; $j++) {  

						$tmp *= $array[$x][$y];
						echo $x.'x'.$y.' ('.$array[$x][$y].') | ';
						
						
						$x = ($x+1) % $m;
						$y = ($y+1) % $m;
					}
					$res += $tmp;
					echo '+'.$tmp.BR;
					
					$x = ($x) % $m;
					$y = ($y+1) % $m;
				}
				
				# minus
				$x = 0;
				$y = 0;
				for ($i = 0; $i < $m; $i++) {
					$tmp = 1;
					
					for ($j = 0; $j < $m; $j++) {  

						$tmp *= $array[$x][$y];
						echo $x.'x'.$y.' ('.$array[$x][$y].') | ';
						
						
						$x = ($x+1) % $m;
						$y = ($y+$m-1) % $m;
					}
					$res -= $tmp;
					echo '-'.$tmp.BR;
					
					$x = ($x) % $m;
					$y = ($y+1) % $m;
				}
				
				return $res;
				
			default:
				//are computed differently! Laplace’scher Entwicklungssatz!
		}
		
		return false;
	}
	
	/**
	 * N > 3: Laplace’scher Entwicklungssatz!
	 * Durch wiederholtes Anwenden der Entwicklungsformel kann man jede n-reihige Determinante durch 1-reihige Determinanten ausdrücken.
	 * vik = (-1)i+k
	 */
	public function _determinantForGreater3($array) {
		list($x, $y) = $this->_bestMatchForLaplace($array);
		$d = count($array);
		
		$res = 1;
		// SUM(k=i--n) vik * aik + Dik
		for ($i = 0; $i < $d; $i++) {
			$a = $b = 0;
			
			$v = (-1)^($a+$b);
			//$res += ;
		}
		
		return $res;
	}
	
	/**
	 * search the row+column with the most zeros or ones
	 * 
	 */
	public function _bestMatchForLaplace(&$array) {
		
		return array(0, 0);
	}
	

	//********************************************************************

	public function createZeroMatrix($m, $n) {
		$matrix = array();
		for ($i = 0; $i < $m; $i++) {		
			for ($j = 0; $j < $n; $j++) { 
				$matrix[$i][$j] = 0;
			}	
		}
		return $matrix;
	}


	public function reset() {
		$this->matrix = array();
		$this->m = $this->n = 0;
		$this->error = '';
	}

} //end class



