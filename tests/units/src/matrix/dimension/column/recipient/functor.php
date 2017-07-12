<?php namespace estvoyage\ticTacToe\tests\units\matrix\dimension\column\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\dimension\column\recipient')
		;
	}

	function testNumberOfColumnsInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$column = new mockOfTicTacToe\matrix\dimension\side
			)
			->if(
				$this->testedInstance->numberOfColumnsInMatrixIs($column)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $column ])
		;
	}
}
