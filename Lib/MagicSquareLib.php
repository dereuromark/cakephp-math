<?php

class MagicSquareLib {

	protected $_size;

	protected $_magicConstant = null;

	/**
	 * @throws RuntimeException
	 * @return void
	 */
	public function __construct($size = 3) {
		if ($size < 3 || ($size % 2) === 0) {
			throw new RuntimeException("Size must be at least 3 and odd.");
		}
		$this->_size = $size;
	}

	/**
	 * Get first possible square
	 * @return array
	 */
	public function getSquare() {
		return $this->_square($this->_size);
	}

	/**
	 * Get all possible squares
	 * @return array of arrays
	 */
	public function getSquares() {

	}

	protected function _square($n) {
		$field = array();
		$row = 0;
		$column = $n / 2;

		$i = 1;

		// Die Eins kommt immer in die Mitte der ersten $row.
		if ($i === 1) {
			$field[0][$n / 2] = $i;
		}
		// Jetzt wird das Array befüllt
		while ($i < $n * $n) {
			if ($i % $n === 0) {
				$i++;
				$row++;
				$field[$row][$column] = $i;
			} else {
				$i++;
				$row--;
				$column++;
				$column = $column % $n;
				$row = ($row + $n) % $n;
				$field[$row][$column] = $i;
			}
		}

		return $field;
	}

	public function getMagicConstant() {
		if ($this->_magicConstant === null) {
			$this->_magicConstant = self::magicConstant($this->_size);
		}
		return $this->_magicConstant;
	}

	/**
	 * @throws RuntimeException
	 * @return bool
	 */
	public static function isMagic(array $square) {
		$n = count($square);
		if ($n < 3 || $n !== count($square[0])) {
			throw new RuntimeException('Invalid input');
		}
		$magicConstant = self::magicConstant($n);
		$diagLeft = 0;
		$diagRight = 0;

		for ($i = 0; $i < $n; $i++) {
			$row = 0;
			$column = 0;

			for ($j = 0; $j < count($square[$i]); $j++) {
				if ($square[$i][$j] === 0) {
					return false;
				}
				$row += $square[$i][$j];
				$column += $square[$j][$i];
			}

			if ($row !== $magicConstant || $column !== $magicConstant)
				return false;

			$diagLeft += $square[$i][$i];
			$diagRight += $square[($n - 1) - $i][$i];
		}

		if ($diagLeft !== $magicConstant || $diagRight !== $magicConstant) {
			return false;
		}
		return true;
	}

	public static function magicConstant($size) {
		return ($size * (($size * $size) + 1)) / 2;
	}

	public static function toTable(array $array) {
		$n = count($array);
		$res = '<table>';
		// Ausgabe des Arrays
		for ($row = 0; $row < $n; $row++) {
			$res .= '<tr>';
			for ($column = 0; $column < $n; $column++) {
				$res .= '<td>';
				$x = $array[$row][$column];

				$res .= $x . '  ';
				$res .= "\t\t";

				if ($column === $n - 1) {
					$res .= "\n";
				}
				$res .= '</td>';
			}
			$res .= '</tr>';
		}
		$res .= '</table>';
		return $res;
	}

}
