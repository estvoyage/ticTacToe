<?php namespace estvoyage\ticTacToe\tests\units\symbol\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\recipient')
		;
	}

	function testTicTacToeSymbolIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$symbol = new mockOfTicTacToe\symbol
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIs($symbol)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $symbol ])
		;
	}
}
