<?php namespace estvoyage\ticTacToe\tests\units\ointeger\comparison\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\comparison\unary')
		;
	}

	function testConditionOfComparisonWithOIntegerIsCondition()
	{
		$this
			->given(
				$this->newTestedInstance($ointeger1 = new mockOfTicTacToe\ointeger, $comparison = new mockOfTicTacToe\ninteger\comparison\binary),
				$ointeger2 = new mockOfTicTacToe\ointeger,
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithOIntegerIs($ointeger2, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger1, $comparison))
				->mock($comparison)
					->receive('conditionOfComparisonBetweenNIntegerAndNIntegerIs')
						->never

			->given(
				$valueOfOinteger1 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($valueOfOinteger1) {
					$recipient->nintegerIs($valueOfOinteger1);
				},

				$valueOfOinteger2 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($valueOfOinteger2) {
					$recipient->nintegerIs($valueOfOinteger2);
				}
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithOIntegerIs($ointeger2, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger1, $comparison))
				->mock($comparison)
					->receive('conditionOfComparisonBetweenNIntegerAndNIntegerIs')
						->withArguments($valueOfOinteger2, $valueOfOinteger1, $condition)
							->once
		;
	}
}
