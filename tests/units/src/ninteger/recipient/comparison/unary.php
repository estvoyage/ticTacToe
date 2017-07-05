<?php namespace estvoyage\ticTacToe\tests\units\ninteger\recipient\comparison;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class unary extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\recipient')
		;
	}

	function testNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($comparison = new mockOfTicTacToe\ninteger\comparison\unary, $recipient = new mockOfTicTacToe\ninteger\comparison\unary\recipient),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($comparison, $recipient))
				->mock($recipient)
					->receive('comparisonWithNIntegerIs')
						->never

			->given(
				$this->calling($comparison)->recipientOfComparisonWithNIntegerIs = function($ninteger, $recipient) {
					$recipient->comparisonWithNIntegerIs($ninteger, false);
				}
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($comparison, $recipient))
				->mock($recipient)
					->receive('comparisonWithNIntegerIs')
						->withArguments($ninteger, false)
							->once

			->given(
				$this->calling($comparison)->recipientOfComparisonWithNIntegerIs = function($ninteger, $recipient) {
					$recipient->comparisonWithNIntegerIs($ninteger, true);
				}
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($comparison, $recipient))
				->mock($recipient)
					->receive('comparisonWithNIntegerIs')
						->withArguments($ninteger, true)
							->once
		;
	}
}
