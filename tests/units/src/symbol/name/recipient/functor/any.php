<?php namespace estvoyage\ticTacToe\tests\units\symbol\name\recipient\functor;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\name\recipient')
		;
	}

	function testTicTacToeSymbolIsX()
	{
		$this
			->given(
				$arguments = null,
				$this->newTestedInstance(
					$callable = function() use (& $arguments) { $arguments = true; }
				)
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIsX()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->boolean($arguments)
					->isTrue
		;
	}

	function testTicTacToeSymbolIsO()
	{
		$this
			->given(
				$arguments = null,
				$this->newTestedInstance(
					$callable = function() use (& $arguments) { $arguments = true; }
				)
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIsO()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->boolean($arguments)
					->isTrue
		;
	}
}
