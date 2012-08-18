<?php

App::import('Lib', 'Math.GravityLib');

/**
 * testing
 * 2009-07-15 ms
 */
class GravityLibTest extends CakeTestCase {
	public $Gravity = null;

	public function startTest() {
		$this->Gravity = new GravityLib();
	}

/** Start **/

	public function testWeight() {
		echo '<h3>Weight</h3>';
		$is = $this->Gravity->iWeight(430);
		$this->assertEquals(round($is, 4), 4216.8595);

	}

	public function testGVar() {
		echo '<h3>GVar</h3>';
		$is = $this->Gravity->gVariable(0);
		$this->assertEquals(round($is, 4), round($this->Gravity->g0Constant(),4)); # 0m above ground

		$is = $this->Gravity->gVariable(30);
		$this->assertEquals(round($is, 4), 9.8057); # 30m above ground

		$is = $this->Gravity->gVariable(10000);
		$this->assertEquals(round($is, 4), 9.5059); # 10km above ground

	}


/** End **/

}

