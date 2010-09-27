<?
/* 
   Example for Linkedlist.php 
   copyright 2003 Bas Jobsen (bas@startpunt.cc)
   Last Change: 20003/02/13
*/     
include('Linkedlist.php');

$LIST= new LinkedList();

$ITEM1= new ListItem(5);
$ITEM2= new ListItem(6);
$ITEM3= new ListItem(12);
$ITEM4= new ListItem(1);
$ITEM5= new ListItem(165);
	
$LIST->ListInsert($ITEM1);
$LIST->ListInsert($ITEM2);
$LIST->ListInsert($ITEM3);
$LIST->ListInsert($ITEM4);
$LIST->Listshow();
echo '--'."\n";
$x=$LIST->ListSearch(1); /* 1) */
$LIST->ListDelete($x);
$LIST->Listshow();
echo '--'."\n";
$LIST->ListInsert($ITEM5);
$LIST->Listshow();
echo '--'."\n";
$LIST->ListDelete(&$ITEM5);  /* 2) */
$LIST->Listshow();
/*
The procedure ListDelete removes an element form
a linked list. It must give be given a pointer 2)
to x. If you wish to delete an element with a given 
key you must first call ListSearch 1) to retrieve
a pointer to the element.
from:
Introduction to ALGORITHMS
Thomas H. Cormen
Charles E. Leiserson
Ronald L. Rivest
www-mitpress.mit.edu
*/
?>