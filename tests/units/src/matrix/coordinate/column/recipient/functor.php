<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\column\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate\column\recipient')
		;
	}

	function testColumnInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$column = new mockOfTicTacToe\matrix\coordinate\distance
			)
			->if(
				$this->testedInstance->columnInMatrixIs($column)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $column ])
		;
	}
}
