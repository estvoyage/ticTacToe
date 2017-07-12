<?php namespace estvoyage\ticTacToe\tests\units\ointeger\operation\binary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\operation\binary')
		;
	}

	function testRecipientOfOperationWithOIntegerAndOIntegerIs()
	{
		$this
			->given(
				$ointeger1 = new mockOfTicTacToe\ointeger,

				$ointeger1Value = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointeger1Value) {
					$recipient->nintegerIs($ointeger1Value);
				},

				$ointeger2 = new mockOfTicTacToe\ointeger,

				$ointeger2Value = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointeger2Value) {
					$recipient->nintegerIs($ointeger2Value);
				},

				$template = new mockOfTicTacToe\ointeger,

				$nintegerOperation = new mockOfTicTacToe\ninteger\operation\binary,

				$nintegerAfterOperation = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($nintegerOperation)->recipientOfOperationWithNIntegerAndNIntegerIs = function($ninteger1, $ninteger2, $recipient) use ($ointeger1Value, $ointeger2Value, $nintegerAfterOperation) {
					if ($ninteger1 == $ointeger1Value && $ninteger2 == $ointeger2Value)
					{
						$recipient->nintegerIs($nintegerAfterOperation);
					}
				},

				$operation = new mockOfTicTacToe\ointeger,
				$this->calling($template)->recipientOfOIntegerWithValueIs = function($value, $recipient) use ($nintegerAfterOperation, $operation) {
					if ($value == $nintegerAfterOperation)
					{
						$recipient->ointegerIs($operation);
					}
				},

				$this->newTestedInstance($template, $nintegerOperation),

				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerAndOIntegerIs($ointeger1, $ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $nintegerOperation))
				->mock($recipient)
					->receive('ointegerIs')
						->withArguments($operation)
							->once
		;
	}
}
