<?php
/** pkg.arith.php
 * Simple arithmetic functions
 * (c) Jesus M. Castagnetto, 1999, 2000
 *
 * $Id: pkg.arith.php,v 1.3 2000/02/28 10:02:18 jmcastagnetto Exp $
 */

# start of function sign

/*
 * proto: int function sign ( number )
 * Determines the sign of a number
 * -1 if it is negative, +1 in any other case
 * -----
 */

function sign ($n) {
	return ($n >= 0) ? 1 : -1;
}

# end of function sign


# start of function is_odd

/*
 * proto: bool function is_odd ( number )
 * Determines if a number is odd
 * returns 1 on true, 0 on false
 * -----
 */

function is_odd ($n) {
	return ($n & 1);
}

# end of function is_odd

?>
