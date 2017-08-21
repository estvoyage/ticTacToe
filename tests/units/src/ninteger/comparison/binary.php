<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

abstract class binary extends units\test
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

	abstract protected function argumentsProvider();
}
