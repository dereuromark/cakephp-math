<?php
class MathController extends MathAppController {

	public $uses = array();

	public function beforeFilter() {
		parent::beforeFilter();

		$this->modelClass = '';

		if (isset($this->Auth)) {
			$this->Auth->allow('*');
		}
	}



/****************************************************************************************
 * USER functions
 ****************************************************************************************/

	public function index() {

	}

	/**
	 * calculating and transforming temperatures
	 */
	public function temperature() {
		App::import('Lib', 'Tools.TemperatureLib');
		$temperatureLib = new TemperatureLib();
		$units = $temperatureLib->getSupported();
		$this->set(compact('units'));
		$result = '';
		if ($this->Common->isPost()) {
			$temperatureLib->set($this->request->data['Math']['value'], $this->request->data['Math']['unit']);
			$result = $temperatureLib->get($this->request->data['Math']['targetUnit'], true);
		}

		$this->set(compact('result'));
	}

	/**
	 *
	 */
	public function half_life() {
		App::import('Lib', 'Math.HalfLifeLib');
		$HalfLife = new HalfLifeLib();
		$result = '';
		if ($this->Common->isPost()) {

			switch($this->request->data['Math']['selection']) {
				case 0:
					$result = $HalfLife->age($this->request->data['Math']['hlife'], $this->request->data['Math']['pca']);
					break;
				case 1:
					$result = $HalfLife->activity($this->request->data['Math']['hlife'], $this->request->data['Math']['age']);
					break;
				case 2:
					$result = $HalfLife->hlife($this->request->data['Math']['age'], $this->request->data['Math']['pca']);
					break;
			}
		}

		$this->set(compact('result'));
	}


	public function greek() {

	}

	/**
	 * 2010-10-27 ms
	 */
	public function matrix() {
		$session = (array)$this->Session->read('Matrix');
		$m = !empty($session['m']) ? $session['m'] : 2;
		$m = !empty($this->request->params['named']['m']) ? $this->request->params['named']['m'] : $m;

		$n = !empty($session['n']) ? $session['n'] : 2;
		$n = !empty($this->request->params['named']['n']) ? $this->request->params['named']['n'] : $n;

		$matrix = array(
			'm' => $m,
			'n' => $n
		);


		if ($this->Common->isPost()) {
			App::import('Lib', 'Math.MatrixLib');
			$matrixLib = new MatrixLib($this->request->data['Form']);

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
	public function geo() {
		$result = false;

		$selectOptions = array(
			'pythagoras' => 'Pythagoras', 'distance' => 'Entfernung zwischen 2 Punkten', 'angleSum' => 'Winkelsumme im Dreieck',
			'circumferenceOfCircle' => 'Umfang Kreis', 'circumferenceOfRectangle' => 'Umfang Rechteck', 'circumferenceOfTriangle' => 'Umfang Dreieck',
			'areaOfCircle' => 'Flächeninhalt Kreis', 'areaOfRectangle' => 'Flächeninhalt Rechteck', 'areaOfTriangle' => 'Flächeninhalt Dreieck',
		);

		if (!empty($this->request->data['Form']['select']) && array_key_exists($this->request->data['Form']['select'], $selectOptions)) {
			App::import('Lib', 'Math.GeometryLib');
			$geoLib = new GeometryLib();
			$params = $this->_clean($this->request->data['Form']);
			switch ($this->request->data['Form']['select']) {
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

	public function _clean($array) {
		App::import('Lib', 'Math.MatrixLib');
		$matrixLib = new MatrixLib();
		return $matrixLib->clean($array);
	}

/****************************************************************************************
 * deprecated/test functions
 ****************************************************************************************/

}

