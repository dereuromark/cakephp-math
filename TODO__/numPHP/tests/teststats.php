<?php

/*
 * To test pkg.stats
 * $Id: teststats.php,v 1.3 2000/02/27 10:37:58 jmcastagnetto Exp $
 */

require("../pkg.stats.php");

echo "Version: ".VER."\n";

$a = array (2,2.3,4.5,2,2,3.2,5.3,3,4,5,1,6);
//$a = array (1.1650,0.6268, 0.6268, 0.0751, 0.3516, -0.6965);

echo "SUM: ".sum($a)."\n";
echo "SUM2: ".sum2($a)."\n";
echo "mean: ".mean($a)."\n";
echo "median: ".median($a)."\n";
echo "mode: ".mode($a)."\n";
echo "min: ".min($a)."\n";
echo "max: ".max($a)."\n";
echo "est_variance: ".est_variance($a)."\n";
echo "est_sd: ".est_sd($a)."\n";
echo "abs_deviation: ".abs_deviation($a)."\n";
echo "skewness : ".skewness($a)."\n";
echo "skewness big: ".skewness_big($a)."\n";
echo "kurtosis: ".kurtosis($a)."\n";
echo "kurtosis big: ".kurtosis_big($a)."\n";
echo "variance_with_mean: ".variance_with_mean($a, 3.5)."\n";
echo "sd_with_mean: ".sd_with_mean($a, 3.5)."\n";
echo "abs_deviation_with_mean: ".abs_deviation_with_mean($a, 3.5)."\n";
/*
echo "====\n";
echo "quant 0: ".quartile($a,0.0)."\n";
echo "quant 0.5: ".quartile($a,0.5)."\n";
echo "quant 0.75: ".quartile($a,0.75)."\n";
echo "quant 1: ".quartile($a,1.0)."\n";
*/

?>
