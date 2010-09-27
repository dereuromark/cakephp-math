<?php
/*
Quicksort -QSort.php
Autor: Cássio Seffrin - cassioseffrin@gmail.com

Requisitos: PHP5

Quicksort (Troca e partição)
É um dos melhores métodos de ordenação e se inclui na classe dos métodos de permutação.
Criado por C. A. R. Hoare, em 1962, este método particiona o vetor em dois segmentos de
tal forma que todo elemento do segmento da esquerda seja menor que qualquer elemento do
segmento da direita. Cada segmento é reparticionado segundo o mesmo critério, e assim
sucessivamente. A solução tem característica recursiva.
Para particionar, escolhe-se um valor arbitrário, chamado pivô; varre-se o vetor da esquerda
para a direita até encontrar um elemento maior que o pivô; varre-se, a seguir, da direita para
a esquerda, até alcançar um elemento menor que o pivô. Permuta-se, então, esses dois
elementos. Este processo continua até que os dois deslocamentos se encontrem.
O algoritmo que exibimos a seguir, transcrito de Wirth[6], adota como pivô o valor do
elemento central da partição. Outros critérios, todavia, podem ser utilizados para esta
escolha.

fonte: http://www.inf.unisinos.br/~anibal/prog2ordena.pdf

Última Atualizacao: 04/04/2007
Versão: 1.2
*/

class QSort{
	public static $array;
	function QSort($arrayR){
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

?>


