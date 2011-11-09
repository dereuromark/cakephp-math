<?

/* Linked list -Linkedlist.php-

A linked list is a data structure in which the objects are arranged
in a lineair order. Unlike a array, thought in which the lineair order
is determined bij array indices, the order is determinded by a
pointer in each object.

Algorithm from:
Introduction to ALGORITHMS
Thomas H. Cormen
Charles E. Leiserson
Ronald L. Rivest
www-mitpress.mit.edu

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

copyrigth 2002 Email Communications, http://www.emailcommunications.nl/
written by Bas Jobsen (bas@startpunt.cc)
Last Change: 2003/02/13
*/


class ListItem {
	public $key;
	public $next;
	public $prev;

	public function ListItem($key = null) {
		$this->key = $key;
		$this->next = null;
		$this->prev = null;
	}
}

class LinkedList {
	public $head;

	public function LinkedList() {
		$this->head = null;
	}

	public function ListInsert(&$x) {

		$x->next = &$this->head;
		if (!is_null($this->head)) $this->head->prev = &$x;
		$this->head = &$x;
		$this->head->prev = null;

	}

	public function ListSearch($k) {
		$x = &$this->head;
		while (!is_null($x) && $x->key != $k) {
			$x = &$x->next;
		}
		return $x;
	}

	public function ListDelete(&$x) {
		if (!is_null($x->prev)) $x->prev->next = &$x->next;
		else  $this->head = &$x->next;
		if (!is_null($x->next)) $x->next->prev = &$x->prev;
	}

	public function Listshow() {
		$x = &$this->head;
		$b = 1;
		while ($b) {
			echo 'key:' . $x->key . "\n";
			if (is_null($x->next)) $b = 0;
			$x = &$x->next;
		}

	}

}


