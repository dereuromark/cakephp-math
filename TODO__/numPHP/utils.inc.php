<?php

/*
 * Utility functions to be used in NumPHP
 * (c) Jesus M. Castagnetto 1999,2000.
 *
 * $Id: utils.inc.php,v 1.2 2000/02/27 09:46:37 jmcastagnetto Exp $
 */

########################################

$NUMPHP_ERROR = "";

define(NULL,"");

function throwError ($str) {
	global $NUMPHP_ERROR;
	$NUMPHP_ERROR = "*ERROR* ".$str;
}

function isError() {
	global $NUMPHP_ERROR;
	return ($NUMPHP_ERROR != "");
}

function printError() {
	global $NUMPHP_ERROR;
	if ( isError() ) {
		echo $NUMPHP_ERROR."\n";
	}
	clearError();
}

function clearError() {
	global $NUMPHP_ERROR;
	$NUMPHP_ERROR="";
}

function printPoint($point) {
	$str = implode(", ",$point);
	return "( ".$str." )";
}

function printPointList($pointlist) {
	for ($i=0; $i<count($pointlist); $i++) {
		$tmp .= printPoint($pointlist[$i])."\n";
	}
	return $tmp;
}

/* vim: set ai cin tw=78 ts=4 sw=4: */
?>
