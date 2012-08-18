<?php

App::import('Lib', 'Math.KruskalLib');

/**
 * testing
 * 2009-07-15 ms
 */
class KruskalLibTest extends CakeTestCase {
	public $Kruskal = null;

	public function startTest() {
		//$this->Kruskal = new KruskalLib();
	}



/** Start **/

	public function _printArcs($aText,$arcArray,$nArcs) {
		?>
		<ul><?php echo $aText?>, <?php echo $nArcs?> arcs
		<?php
			foreach ($arcArray as $arc => $cost) {
		?>
		<li>arc <?php echo $arc?>, cost <?php echo $cost?>
		<?php
			}
		?>
		</ul>
		<?php
	}



	public function testKruskal() {
		$arcs = array(
			"AB" => 17,
			"BC" => 23,
			"CD" => 32,
			"DE" => 14,
			"AF" => 11,
			"FG" => 19,
			"BG" => 28,
			"GH" => 27,
			"CH" => 21,
			"HI" => 15,
			"DI" => 11,
			"IJ" => 42,
			"EJ" => 41,
			"FK" => 10,
			"KL" => 26,
			"GL" => 61,
			"LM" => 20,
			"HM" => 31,
			"MN" => 18,
			"IN" => 71,
			"NP" => 21,
			"JP" => 51
		);

		$k = new KruskalLib($arcs);
		$min_arcs = $k->findMinimum();
		$min_cost = $k->calculateMinimumCost();

		$this->_printArcs('base graph ', $arcs, count($arcs));
		$this->_printArcs("minimal spanning tree, cost $min_cost", $min_arcs, count($min_arcs));
	}


/** End **/

}

