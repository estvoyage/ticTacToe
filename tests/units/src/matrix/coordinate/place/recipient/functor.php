<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\place\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate\place\recipient')
		;
	}

	function testPlaceInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$place = new mockOfTicTacToe\matrix\coordinate\place
			)
			->if(
				$this->testedInstance->placeInMatrixIs($place)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $place ])
		;
	}
}
