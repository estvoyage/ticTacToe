<?php namespace estvoyage\ticTacToe\tests\units\ointeger\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\operation\unary')
		;
	}

	function testRecipientOfOperationWithOIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($ointeger1 = new mockOfTicTacToe\ointeger, $operation = new mockOfTicTacToe\ointeger\operation\binary),
				$ointeger2 = new mockOfTicTacToe\ointeger,
				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
					$this->testedInstance->recipientOfOperationWithOIntegerIs($ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger1, $operation))
				->mock($operation)
					->receive('recipientOfOperationWithOIntegerAndOIntegerIs')
						->withArguments($ointeger2, $ointeger1, $recipient)
							->once
		;
	}
}
