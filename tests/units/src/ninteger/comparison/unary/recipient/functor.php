<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\comparison\unary\recipient')
		;
	}

	function testComparisonWithNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$boolean = rand(0, 1) == 1
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, $boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $ninteger, $boolean ])
		;
	}
}
