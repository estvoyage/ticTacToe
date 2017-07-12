<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\row\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate\row\recipient')
		;
	}

	function testRowInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$row = new mockOfTicTacToe\matrix\coordinate\distance
			)
			->if(
				$this->testedInstance->rowInMatrixIs($row)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $row ])
		;
	}
}
