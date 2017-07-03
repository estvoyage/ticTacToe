<?php namespace estvoyage\ticTacToe\tests\units\ninteger\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\recipient')
		;
	}

	function testNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $ninteger ])
		;
	}
}
