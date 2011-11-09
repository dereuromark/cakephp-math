<?php
/*
Quicksort -QSort.php
Autor: Cбssio Seffrin - cassioseffrin@gmail.com

Requisitos: PHP5

Quicksort (Troca e partiзгo)
Й um dos melhores mйtodos de ordenaзгo e se inclui na classe dos mйtodos de permutaзгo.
Criado por C. A. R. Hoare, em 1962, este mйtodo particiona o vetor em dois segmentos de
tal forma que todo elemento do segmento da esquerda seja menor que qualquer elemento do
segmento da direita. Cada segmento й reparticionado segundo o mesmo critйrio, e assim
sucessivamente. A soluзгo tem caracterнstica recursiva.
Para particionar, escolhe-se um valor arbitrбrio, chamado pivф; varre-se o vetor da esquerda
para a direita atй encontrar um elemento maior que o pivф; varre-se, a seguir, da direita para
a esquerda, atй alcanзar um elemento menor que o pivф. Permuta-se, entгo, esses dois
elementos. Este processo continua atй que os dois deslocamentos se encontrem.
O algoritmo que exibimos a seguir, transcrito de Wirth[6], adota como pivф o valor do
elemento central da partiзгo. Outros critйrios, todavia, podem ser utilizados para esta
escolha.

fonte: http://www.inf.unisinos.br/~anibal/prog2ordena.pdf

Ъltima Atualizacao: 04/04/2007
Versгo: 1.2
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


