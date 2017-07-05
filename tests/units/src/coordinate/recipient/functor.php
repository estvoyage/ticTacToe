<?php namespace estvoyage\ticTacToe\tests\units\coordinate\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\recipient')
		;
	}

	function testLineAndColumnOfTicTacToeSymbolIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$line = rand(PHP_INT_MIN, PHP_INT_MAX),
				$column = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->lineAndColumnOfTicTacToeSymbolIs($line, $column)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $line, $column ])
		;
	}
}
