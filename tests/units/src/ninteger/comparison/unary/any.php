<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\comparison\unary')
		;
	}

	function testConditionOfComparisonWithNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($ninteger = rand(PHP_INT_MIN, PHP_INT_MAX), $comparison = new mockOfTicTacToe\ninteger\comparison\binary),
				$boolean = rand(0, 1) == 1,
				$ninteger2 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithNIntegerIs($ninteger2, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger, $comparison))
				->mock($comparison)
					->receive('conditionOfComparisonBetweenNIntegerAndNIntegerIs')
						->withArguments($ninteger2, $ninteger, $condition)
							->once
		;
	}
}
