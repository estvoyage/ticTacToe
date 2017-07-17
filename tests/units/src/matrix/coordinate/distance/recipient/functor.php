<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\distance\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate\distance\recipient')
		;
	}

	function testMatrixCoordinateHasDistance()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$distance = new mockOfTicTacToe\matrix\coordinate\distance
			)
			->if(
				$this->testedInstance->matrixCoordinateHasDistance($distance)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $distance ])
		;
	}
}
