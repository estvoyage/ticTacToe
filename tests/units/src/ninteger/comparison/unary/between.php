<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class between extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\comparison\unary')
		;
	}

	/**
	 * @dataProvider upDownNIntegerAndBooleanProvider
	 */
	function testConditionOfComparisonWithNIntegerIs($up, $down, $ninteger, $boolean)
	{
		$this
			->given(
				$this->newTestedInstance($up, $down),
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithNIntegerIs($ninteger, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($up, $down))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments($boolean)
							->once
		;
	}

	protected function upDownNIntegerAndBooleanProvider()
	{
		return [
			[ PHP_INT_MIN, PHP_INT_MAX, rand(PHP_INT_MIN + 1, PHP_INT_MAX - 1), true ],
			[ 0, PHP_INT_MAX, rand(PHP_INT_MIN, - 1), false ],
			[ rand(PHP_INT_MIN, - 1), -1, rand(0, PHP_INT_MAX), false ],
			[ 0, 8, -8, false ]
		];
	}
}
