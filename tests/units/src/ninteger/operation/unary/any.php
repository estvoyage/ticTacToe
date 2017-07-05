<?php namespace estvoyage\ticTacToe\tests\units\ninteger\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
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
				$this->newTestedInstance($ninteger1 = rand(PHP_INT_MIN, PHP_INT_MAX), $operation = new mockOfTicTacToe\ninteger\operation\binary),
				$ninteger2 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerIs($ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger1, $operation))
				->mock($operation)
					->receive('recipientOfOperationWithNIntegerAndNIntegerIs')
						->withArguments($ninteger1, $ninteger2, $recipient)
							->once
		;
	}
}
