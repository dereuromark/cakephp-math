<?php
class MathController extends MathAppController {

	var $name = 'Math';
	var $uses = array();

	function beforeFilter() {
		parent::beforeFilter();
		
		if (isset($this->AuthExt)) {
			$this->AuthExt->allow('*');
		}
	}



/****************************************************************************************
 * USER functions
 ****************************************************************************************/

	function index() {

	}

	/**
	 * calculating and transforming temperatures
	 */
	function temperature() {
		App::import('Lib', 'Tools.TemperatureLib');
		$temperatureLib = new TemperatureLib();
		$units = $temperatureLib->get_supported();
		$this->set(compact('units'));
		$result = '';
		if (!empty($this->data)) {
			$temperatureLib->set($this->data['Math']['value'], $this->data['Math']['unit']);
			$result = $temperatureLib->get($this->data['Math']['targetUnit'], true);
		}

		$this->set(compact('result'));
	}


	function greek() {

	}

	/**
	 * 2010-10-27 ms
	 */
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

			$matrix['solvable'] = $matrixLib->isSolvable();
			$matrix['symmetric'] = $matrixLib->isSymmetric();
			$matrix['skew_symmetric'] = $matrixLib->isSkewSymmetric();
			$matrix['positive_definite'] = $matrixLib->isPositiveDefinite();
			$matrix['quadratic'] = $matrixLib->isQuadratic();
			$matrix['trace'] = $matrixLib->getTrace();
			$matrix['row_echelon'] = $matrixLib->isRowEchelonForm();
			$matrix['reduced_row_echelon'] = $matrixLib->isReducedRowEchelonForm();
			$matrix['reduced_row_echelon_matrix'] = $matrixLib->reducedRowEchelonForm();

		}


		$this->set(compact('matrix'));
		$this->Session->write('Matrix', $matrix);
	}

	/**
	 * 2010-10-27 ms
	 */
	function geo() {
		$result = false;

		$selectOptions = array(
			'pythagoras' => 'Pythagoras', 'distance' => 'Entfernung zwischen 2 Punkten', 'angleSum' => 'Winkelsumme im Dreieck',
			'circumferenceOfCircle' => 'Umfang Kreis', 'circumferenceOfRectangle' => 'Umfang Rechteck', 'circumferenceOfTriangle' => 'Umfang Dreieck',
			'areaOfCircle' => 'Flächeninhalt Kreis', 'areaOfRectangle' => 'Flächeninhalt Rechteck', 'areaOfTriangle' => 'Flächeninhalt Dreieck',
		);

		if (!empty($this->data['Form']['select']) && array_key_exists($this->data['Form']['select'], $selectOptions)) {
			App::import('Lib', 'Math.GeometryLib');
			$geoLib = new GeometryLib();
			$params = $this->_clean($this->data['Form']);
			switch ($this->data['Form']['select']) {
				case 'pythagoras':
					$result = $geoLib->pythagoras($params['a'], $params['b']);
					break;
				case 'distance':
					$result = $geoLib->distance($params['x1'], $params['y1'], $params['x2'], $params['y2']);
					break;
				case 'angleSum':
					$result = $geoLib->angleSum($params['corners']);
					break;
				case 'circumferenceOfCircle':
					$result = $geoLib->circumferenceOfCircle($params['radius']);
					break;
				case 'circumferenceOfRectangle':
					$result = $geoLib->circumferenceOfRectangle($params['a'], $params['b']);
					break;
				case 'circumferenceOfTriangle':
					$result = $geoLib->circumferenceOfRectangle($params['a'], $params['b'], $params['c']);
					break;
				case 'areaOfCircle':
					$result = $geoLib->areaOfCircle($params['radius']);
					break;
				case 'areaOfRectangle':
					$result = $geoLib->areaOfRectangle($params['a'], $params['b']);
					break;
				case 'areaOfTriangle':
					$result = $geoLib->areaOfTriangle($params['a'], $params['b'], $params['c']);
					break;
			}

		}

		$this->set(compact('result', 'selectOptions'));
	}


/****************************************************************************************
 * protected/interal functions
 ****************************************************************************************/

	function _clean($array) {
		App::import('Lib', 'Math.MatrixLib');
		$matrixLib = new MatrixLib();
		return $matrixLib->clean($array);
	}

/****************************************************************************************
 * deprecated/test functions
 ****************************************************************************************/

}

