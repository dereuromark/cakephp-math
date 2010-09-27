<?php
require_once("Kruskal.class.php");

function print_arcs($aText,$arcArray,$nArcs) {
?>
<ul><?=$aText?>, <?=$nArcs?> arcs
<?php	
	foreach ($arcArray as $arc => $cost) {
?>
<li>arc <?=$arc?>, cost <?=$cost?>
<?php
	}
?>
</ul>
<?php
}

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

$k = new Kruskal($arcs);
$min_arcs = $k->findMinimum();
$min_cost = $k->calculateMinimumCost();


print_arcs('base graph ', $arcs, count($arcs));
print_arcs("minimal spanning tree, cost $min_cost", $min_arcs, count($min_arcs));

?>