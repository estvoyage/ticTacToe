<?php namespace estvoyage\ticTacToe\tests\units\ninteger\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class collection extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\operation\unary')
		;
	}

	function testRecipientOfOperationWithNIntegerIs()
	{
		$this
			->given(
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),

				$nintegerAfterOperation1 = rand(PHP_INT_MIN, PHP_INT_MAX),

				$operation1 = new mockOfTicTacToe\ninteger\operation\unary,
				$this->calling($operation1)->recipientOfOperationWithNIntegerIs = function($aNInteger, $recipient) use ($ninteger, $nintegerAfterOperation1) {
					if ($ninteger == $aNInteger)
					{
						$recipient->nintegerIs($nintegerAfterOperation1);
					}
				},

				$nintegerAfterOperation2 = rand(PHP_INT_MIN, PHP_INT_MAX),

				$operation2 = new mockOfTicTacToe\ninteger\operation\unary,
				$this->calling($operation2)->recipientOfOperationWithNIntegerIs = function($aNInteger, $recipient) use ($nintegerAfterOperation1, $nintegerAfterOperation2) {
					if ($nintegerAfterOperation1 == $aNInteger)
					{
						$recipient->nintegerIs($nintegerAfterOperation2);
					}
				},

				$recipient = new mockOfTicTacToe\ninteger\recipient,

				$this->newTestedInstance($operation1, $operation2)
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerIs($ninteger, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operation1, $operation2))
				->mock($recipient)
					->receive('nintegerIs')
						->withArguments($nintegerAfterOperation2)
							->once

			->given(
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$operation1 = new mockOfTicTacToe\ninteger\operation\unary,
				$operation2 = new mockOfTicTacToe\ninteger\operation\unary,
				$recipient = new mockOfTicTacToe\ninteger\recipient,
				$this->newTestedInstance($operation1, $operation2)
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerIs($ninteger, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operation1, $operation2))
				->mock($recipient)
					->receive('nintegerIs')
						->never
				->mock($operation2)
					->receive('recipientOfOperationWithNIntegerIs')
						->never

			->given(
				$operation1 = new mockOfTicTacToe\ninteger\operation\unary,
				$this->calling($operation1)->recipientOfOperationWithNIntegerIs = function($aNInteger, $recipient) {
					$recipient->nintegerIs(rand(PHP_INT_MIN, PHP_INT_MAX));
				},

				$operation2 = new mockOfTicTacToe\ninteger\operation\unary,

				$this->newTestedInstance($operation1, $operation2)
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerIs($ninteger, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($operation1, $operation2))
				->mock($recipient)
					->receive('nintegerIs')
						->never
		;
	}
}
