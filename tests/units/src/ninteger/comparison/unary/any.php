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

	function testRecipientOfComparisonWithNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($ninteger = rand(PHP_INT_MIN, PHP_INT_MAX), $comparison = new mockOfTicTacToe\ninteger\comparison\binary),
				$boolean = rand(0, 1) == 1,
				$ninteger2 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$recipient = new mockOfTicTacToe\ninteger\comparison\unary\recipient,

				$this->calling($comparison)->recipientOfComparisonBetweenNIntegerAndNIntegerIs = function($anNInteger1, $anNInteger2, $recipient) use ($ninteger, $ninteger2, $boolean) {
					if ($ninteger == $anNInteger2 && $ninteger2 == $anNInteger1)
					{
						$recipient->nbooleanIs($boolean);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithNIntegerIs($ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger, $comparison))
				->mock($recipient)
					->receive('comparisonWithNIntegerIs')
						->withArguments($ninteger2, $boolean)
							->once
		;
	}

	function testRecipientOfComparisonWithNIntegerIsNBooleanRecipient()
	{
		$this
			->given(
				$this->newTestedInstance($ninteger = rand(PHP_INT_MIN, PHP_INT_MAX), $comparison = new mockOfTicTacToe\ninteger\comparison\binary),
				$boolean = rand(0, 1) == 1,
				$ninteger2 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$recipient = new mockOfTicTacToe\nboolean\recipient
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithNIntegerIsNBooleanRecipient($ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger, $comparison))
				->mock($comparison)
					->receive('recipientOfComparisonBetweenNIntegerAndNIntegerIs')
						->withArguments($ninteger2, $ninteger, $recipient)
							->once
		;
	}
}
