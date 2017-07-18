<?php namespace estvoyage\ticTacToe\tests\units\ointeger\comparison\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class lessThan extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\comparison\unary')
		;
	}

	function testConditionOfComparisonWithOIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($ointeger1 = new mockOfTicTacToe\ointeger),
				$ointeger2 = new mockOfTicTacToe\ointeger,
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithOIntegerIs($ointeger2, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger1))
				->mock($condition)
					->receive('nbooleanIs')
						->never

			->given(
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) {
					$recipient->nintegerIs(PHP_INT_MAX);
				},
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) {
					$recipient->nintegerIs(PHP_INT_MIN);
				}
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithOIntegerIs($ointeger2, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger1))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once
		;
	}
}
