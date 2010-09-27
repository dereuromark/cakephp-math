<?php
class MathController extends MathAppController {

	var $name = 'Math';
	var $paginate = array('order'=>array());
	var $uses = array();

	function beforeFilter() {
		parent::beforeFilter();
		$this->AuthExt->allow('*');
	}



/****************************************************************************************
 * USER functions
 ****************************************************************************************/

	function index() {
		
	}


	function matrix() {
		$session = (array)$this->Session->read('Matrix');
		$m = !empty($session['m']) ? $session['m'] : 2;
		$m = !empty($this->params['named']['m']) ? $this->params['named']['m'] : $m;
		
		$n = !empty($session['n']) ? $session['n'] : 2;
		$n = !empty($this->params['named']['n']) ? $this->params['named']['n'] : $n;
		
		$matrix = array(
			'm' => $m,
			'n' => $n
		);
		
		
		if (!empty($this->data)) {
			App::import('Lib', 'Math.MatrixLib');
			$matrixLib = new MatrixLib($this->data['Form']);
			
			$matrix['determant'] = $matrixLib->determinant();
			$matrix['permanent'] = $matrixLib->permanent();
			
			$matrix['quadratic'] = $matrixLib->isQuadratic();
			$matrix['trace'] = $matrixLib->getTrace();
			$matrix['row_echelon'] = $matrixLib->isRowEchelonForm();
			$matrix['reduced_row_echelon'] = $matrixLib->isReducedRowEchelonForm();
			$matrix['reduced_row_echelon_matrix'] = $matrixLib->reducedRowEchelonForm();
			$matrix['solvable'] = $matrixLib->isSolvable();
			$matrix['symmetric'] = $matrixLib->isSymmetric();
			$matrix['skew_symmetric'] = $matrixLib->isSkewSymmetric();
			$matrix['positive_definite'] = $matrixLib->isPositiveDefinite();
		}
		
		
		$this->set(compact('matrix'));
		$this->Session->write('Matrix', $matrix);
	}

/****************************************************************************************
 * protected/interal functions
 ****************************************************************************************/


/****************************************************************************************
 * deprecated/test functions
 ****************************************************************************************/

}
?>