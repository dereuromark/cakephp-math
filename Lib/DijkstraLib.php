<?php

/**
 * class to Build Dijkstra model
 * To build the class 
 * Use int to index all the points on the map
 * @param int startPoint
 * @param array routes[] = array($startPoint,$endPoint,$distance)
 * @author Rick.purple
 */

class DijkstraLib {
	protected $intStartPoint;
	protected $aRoutes = array(); // all possible routes between each two points (single direction)
	protected $aPoints = array(); // all the points on the map
	protected $aReds = array();
	protected $aBlues = array();
	protected $aDistances = array(); // the closest distance from start point to each points
	protected $aPathes = array(); // path from each points to its neibor on the best path to the start point
	protected $aFullPathes; // path from start point to each points

	const I = 100000; // define infinite distance

	/**
	 * Build Dijkstra model, find best path and closest distance from start point to each point on the map 
	 * @return null
	 * @param object $intStartPoint 
	 * @param object $aRoutes
	 */
	public function __construct($intStartPoint, $aRoutes) {
		$this->aRoutes = $aRoutes;
		$this->intStartPoint = $intStartPoint;

		foreach ($aRoutes as $aRoute) {
			if (!in_array($aRoute[0], $this->aPoints)) {
				$this->aPoints[] = $aRoute[0];
			}
			if (!in_array($aRoute[1], $this->aPoints)) {
				$this->aPoints[] = $aRoute[1];
			}
		}

		$this->aReds = array($intStartPoint);
		$this->aBlues = $this->array_remove($this->aPoints, $intStartPoint);

		foreach ($this->aBlues as $intPoint) {
			$this->aDistances[$intPoint] = self::I;
		}
		$this->aDistances[$intStartPoint] = 0;

		$this->findPath();
	}

	/**
	 * function to get the best path
	 * @return pathes for each node on the map
	 */
	public function getPath() {
		foreach ($this->aPoints as $intPoint) {
			$this->fillFullPath($intPoint, $intPoint);
		}
		return $this->aFullPathes;
	}

	/**
	 * function to get the closest distance	 
	 * @return 
	 */
	public function getDistance() {
		return $this->aDistances;
	}

	/**
	 * Remove specified element from array
	 * @return array 
	 * @param array $arr : array to be processing
	 * @param array $value : the element to be remove from the array
	 */
	protected function array_remove($arr, $value) {
		return array_values(array_diff($arr, array($value)));
	}

	/**
	 * Dijkstra algorithm implementation
	 * @return null
	 */
	protected function findPath() {
		while (!empty($this->aBlues)) {
			$intShortest = self::I;
			foreach ($this->aReds as $intRed) {
				# find possible rounte
				foreach ($this->aRoutes as $aRoute) {
					if ($intRed == $aRoute[0]) {
						$aDis[$intRed][$aRoute[1]] = $aRoute[2];

						# rewrite distance
						$intDistance = $this->aDistances[$intRed] + $aRoute[2];
						if ($this->aDistances[$aRoute[1]] > $intDistance) {
							$this->aDistances[$aRoute[1]] = $intDistance;
							# change the path
							if ($intRed == $this->intStartPoint || $intRed == $aRoute[1]) {
							} else {
								$this->aPathes[$aRoute[1]] = $intRed;
							}
						}

						# find the nearest	neighbor
						if (!in_array($aRoute[1], $this->aReds) && $aRoute[2] < $intShortest) {
							$intShortest = $aRoute[2];
							$intAddPoint = $aRoute[1];
						}
					}
				}
			}

			$this->aReds[] = $intAddPoint;
			$this->aBlues = $this->array_remove($this->aBlues, $intAddPoint);
		}
	}

	/**
	 * mid step function to find full path from start point to the end point.
	 * @return null
	 * @param int $intEndPoint
	 * @param int $intMidPoint
	 */
	protected function fillFullPath($intEndPoint, $intMidPoint) {
		if (isset($this->aPathes[$intMidPoint])) {
			$this->aFullPathes[$intEndPoint][] = $this->aPathes[$intMidPoint];
			$this->fillFullPath($intEndPoint, $this->aPathes[$intMidPoint]);
		} else {
			$this->aFullPathes[$intEndPoint][] = $this->intStartPoint;
		}
	}

}


