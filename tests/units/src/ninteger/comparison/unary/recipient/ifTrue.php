<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class ifTrue extends units\test
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
				$boolean = false
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, $boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->variable($arguments)
					->isNull

			->given(
				$boolean = true
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, $boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $ninteger ])
		;
	}
}
