<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate\recipient')
		;
	}

	function testMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$coordinate = new mockOfTicTacToe\matrix\coordinate
			)
			->if(
				$this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $coordinate ])
		;
	}
}
