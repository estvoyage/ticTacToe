<?php namespace estvoyage\ticTacToe\tests\units\ointeger\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class collection extends units\test
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
				$this->newTestedInstance(
					$operation1 = new mockOfTicTacToe\ointeger\operation\unary,
					$operation2 = new mockOfTicTacToe\ointeger\operation\unary
				),
				$ointeger = new mockOfTicTacToe\ointeger,
				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerIs($ointeger, $recipient)
			)
			->then
			->object($this->testedInstance)
				->isEqualTo($this->newTestedInstance($operation1, $operation2))
			->mock($recipient)
				->receive('ointegerIs')
					->never

			->given(
				$ointegerAfterOperation1 = new mockOfTicTacToe\ointeger,
				$this->calling($operation1)->recipientOfOperationWithOIntegerIs = function($anOInteger, $recipient) use ($ointeger, $ointegerAfterOperation1) {
					if ($ointeger == $anOInteger)
					{
						$recipient->ointegerIs($ointegerAfterOperation1);
					}
				},
				$ointegerAfterOperation2 = new mockOfTicTacToe\ointeger,
				$this->calling($operation2)->recipientOfOperationWithOIntegerIs = function($anOInteger, $recipient) use ($ointegerAfterOperation1, $ointegerAfterOperation2) {
					if ($ointegerAfterOperation1 == $anOInteger)
					{
						$recipient->ointegerIs($ointegerAfterOperation2);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerIs($ointeger, $recipient)
			)
			->then
			->object($this->testedInstance)
				->isEqualTo($this->newTestedInstance($operation1, $operation2))
			->mock($recipient)
				->receive('ointegerIs')
					->withArguments($ointegerAfterOperation2)
						->once
		;
	}
}
