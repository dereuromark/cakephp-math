<?php
/*
Quicksort -QSort.php
Autor: C�ssio Seffrin - cassioseffrin@gmail.com

Requisitos: PHP5

Quicksort (Troca e parti��o)
� um dos melhores m�todos de ordena��o e se inclui na classe dos m�todos de permuta��o.
Criado por C. A. R. Hoare, em 1962, este m�todo particiona o vetor em dois segmentos de
tal forma que todo elemento do segmento da esquerda seja menor que qualquer elemento do
segmento da direita. Cada segmento � reparticionado segundo o mesmo crit�rio, e assim
sucessivamente. A solu��o tem caracter�stica recursiva.
Para particionar, escolhe-se um valor arbitr�rio, chamado piv�; varre-se o vetor da esquerda
para a direita at� encontrar um elemento maior que o piv�; varre-se, a seguir, da direita para
a esquerda, at� alcan�ar um elemento menor que o piv�. Permuta-se, ent�o, esses dois
elementos. Este processo continua at� que os dois deslocamentos se encontrem.
O algoritmo que exibimos a seguir, transcrito de Wirth[6], adota como piv� o valor do
elemento central da parti��o. Outros crit�rios, todavia, podem ser utilizados para esta
escolha.

fonte: http://www.inf.unisinos.br/~anibal/prog2ordena.pdf

�ltima Atualizacao: 04/04/2007
Vers�o: 1.2
*/

class QSort{
	public static $array;
	public function QSort($arrayR){
		QSort::$array = $arrayR;
	}
	static function troca($i, $j){
	 $aux = QSort::$array[$i];
	 QSort::$array[$i] = QSort::$array[$j];
	 QSort::$array[$j] = $aux;
	}
	static function particao($p, $q){
	 $j = $p - 1;
	 $aux = QSort::$array[$q];
	 for ($i = $p; $i <= $q; $i++){
	  if (QSort::$array[$i] <= $aux) QSort::troca($i, ++$j);
	 }
	 return $j;
	}

	static function quicksort($p,$q){
	 if ($p < $q){
	  $x = QSort::particao($p, $q);
	  QSort::quicksort($p, $x - 1);
	  QSort::quicksort($x + 1, $q);
	 }
	 return $array;
	}

	public static function imprime(){
		QSort::quicksort(0,count(QSort::$array),QSort::$array);
		for ($i=0; $i<count(QSort::$array); $i++){
				echo QSort::$array[$i]."-";
		}
	}
}


//chamado do metodo
$array=array('18','10','2','1','1','6','5','5','3','2','23','3','34','sdf','cas');
$qs = new QSort($array);
QSort::quicksort(0,count(QSort::$array),QSort::$array);
for ($i=0; $i<count(QSort::$array); $i++){
		echo QSort::$array[$i]."-";
}
// fim chamada do metodo


