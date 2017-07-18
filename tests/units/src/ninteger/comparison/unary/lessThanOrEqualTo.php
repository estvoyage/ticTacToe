<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class lessThanOrEqualTo extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\comparison\unary')
		;
	}

	function testRecipientOfComparisonWithNIntegerIsCondition()
	{
		$this
			->given(
				$this->newTestedInstance(PHP_INT_MAX),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX - 1),
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithNIntegerIsCondition($ninteger, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(PHP_INT_MAX))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once

			->given(
				$ninteger = PHP_INT_MAX
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithNIntegerIsCondition($ninteger, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(PHP_INT_MAX))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->twice

			->given(
				$this->newTestedInstance(PHP_INT_MIN),
				$ninteger = PHP_INT_MIN
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithNIntegerIsCondition($ninteger, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(PHP_INT_MIN))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->thrice

			->given(
				$ninteger = rand(PHP_INT_MIN + 1, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithNIntegerIsCondition($ninteger, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(PHP_INT_MIN))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(false)
							->once
		;
	}
}
