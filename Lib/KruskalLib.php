<?php

/**
 * "Berechnung minimaler Spannbäume von ungerichteten Graphen. Der Graph muss dazu zusätzlich zusammenhängend, kantengewichtet und endlich sein."
 * @see http://de.wikipedia.org/wiki/Algorithmus_von_Kruskal
 * 2010-09-05 ms
 */
class KruskalLib {

	public $arcs = array(); // graph arcs
	public $verts = array(); // graph verts
	public $nVerts = null; // number of verts
	public $min_arcs = array(); //
	public $minCost = 0;
	public $i;

	public function __construct($gArray) {
		$this->arcs = $gArray;

		$i = 1;
		foreach ($gArray as $arc => $cost) {
			for ($i = 0; $i < strlen($arc); $i++) {
				if (empty($this->verts[ucfirst($arc[$i])])) {
					$this->verts[ucfirst($arc[$i])] = $this->i;
					$this->i++;
				}
			}
		}
		$this->nVerts = sizeof($this->verts);
	}

	public function findMinimum() {
		asort($this->arcs);
		reset($this->arcs);
		$this->min_arcs = array();

		$i = 0;
		foreach ($this->arcs as $w => $cost) {
			if ($i < $this->nVerts - 1) {
				if ($this->verts[$w[0]] != $this->verts[$w[1]]) {
					if ($this->verts[$w[0]] > $this->verts[$w[1]]) {
						$m = $this->verts[$w[1]];
						$iM = $this->verts[$w[0]];
					} else {
						$m = $this->verts[$w[0]];
						$iM = $this->verts[$w[1]];
					}
					foreach ($this->verts as $k => $v) {
						if ($v == $m) {
							$this->verts[$k] = $iM;
						}
					}
					$this->min_arcs = array_merge($this->min_arcs, array($w => $cost));
					$i++;
				}

			} else {
				break;
			}

		}
		ksort($this->min_arcs);
		reset($this->min_arcs);

		return $this->min_arcs;
	}

	public function calculateMinimumCost() {
		foreach ($this->min_arcs as $arc => $cost) {
			$this->minCost += $cost;
		}
		return $this->minCost;
	}


}


