<?php namespace estvoyage\ticTacToe\tests\units\ointeger\operation\binary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class addition extends units\test
{
	use units\data\provider\ninteger\addition;

	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\operation\binary')
		;
	}

	/**
	 * @dataProvider overflowProvider
	 */
	function testRecipientOfOperationWithOIntegerAndOIntegerIs_withOverflow($ninteger1, $ninteger2)
	{
		$this
			->given(
				$ointeger1 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger1) {
					$recipient->nintegerIs($ninteger1);
				},

				$ointeger2 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger2) {
					$recipient->nintegerIs($ninteger2);
				},

				$template = new mockOfTicTacToe\ointeger,

				$operation = new mockOfTicTacToe\ointeger,
				$this->calling($template)->recipientOfOIntegerWithValueIs = function($value, $recipient) use ($operation) {
					$recipient->ointegerIs($operation);
				},

				$this->newTestedInstance($template, $block = new mockOfTicTacToe\block),

				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerAndOIntegerIs($ointeger1, $ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments()
							->once
				->mock($recipient)
					->receive('ointegerIs')
						->never
		;
	}

	/**
	 * @dataProvider noOverflowProvider
	 */
	function testRecipientOfOperationWithOIntegerAndOIntegerIs_withNoOverflow($ninteger1, $ninteger2, $noperation)
	{
		$this
			->given(
				$ointeger1 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger1) {
					$recipient->nintegerIs($ninteger1);
				},

				$ointeger2 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger2) {
					$recipient->nintegerIs($ninteger2);
				},

				$template = new mockOfTicTacToe\ointeger,

				$operation = new mockOfTicTacToe\ointeger,
				$this->calling($template)->recipientOfOIntegerWithValueIs = function($value, $recipient) use ($noperation, $operation) {
					if ($value == $noperation)
					{
						$recipient->ointegerIs($operation);
					}
				},

				$this->newTestedInstance($template, $block = new mockOfTicTacToe\block),

				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerAndOIntegerIs($ointeger1, $ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $block))
				->mock($block)
					->receive('blockArgumentsAre')
						->never
				->mock($recipient)
					->receive('ointegerIs')
						->withArguments($operation)
							->once
		;
	}
}
