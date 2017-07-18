<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\binary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class lessThan extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\comparison\binary')
		;
	}

	/**
	 * @dataProvider argumentsProvider
	 */
	function testConditionOfComparisonBetweenNIntegerAndNIntegerIs($ninteger1, $ninteger2, $boolean)
	{
		$this
			->given(
				$this->newTestedInstance,
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionOfComparisonBetweenNIntegerAndNIntegerIs($ninteger1, $ninteger2, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments($boolean)
							->once
		;
	}

	protected function argumentsProvider()
	{
		return [
			[ rand(PHP_INT_MIN, PHP_INT_MAX - 1), PHP_INT_MAX, true ],
			[ PHP_INT_MAX, rand(PHP_INT_MIN, PHP_INT_MAX - 1), false ],
			[ 0, 0, false ],
			[ PHP_INT_MIN, PHP_INT_MIN, false ],
			[ PHP_INT_MAX, PHP_INT_MAX, false ]
		];
	}
}
