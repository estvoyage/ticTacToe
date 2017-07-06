<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class condition extends units\test
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
				$this->newTestedInstance($condition = new mockOfTicTacToe\condition),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$boolean = rand(0, 1) == 1,

				$conditionWithArguments = new mockOfTicTacToe\condition,
				$this->calling($condition)->recipientOfConditionWithArgumentsIs = function($arguments, $recipient) use ($ninteger, $conditionWithArguments) {
					if ($arguments == [ $ninteger ])
					{
						$recipient->conditionIs($conditionWithArguments);
					}
				}
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, $boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($condition))
				->mock($conditionWithArguments)
					->receive('nbooleanIs')
						->withArguments($boolean)
							->once
		;
	}
}
