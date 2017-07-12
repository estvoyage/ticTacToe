<?php namespace estvoyage\ticTacToe\tests\units\ointeger\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, block };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class addition extends units\test
{
	use units\data\provider\ninteger\addition;

	function test__construct()
	{
		$this
			->given(
				$ointeger1 = new mockOfTicTacToe\ointeger,
				$template = new mockOfTicTacToe\ointeger
			)
			->if(
				$this->newTestedInstance($template, $ointeger1)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $ointeger1, new block\blackhole))
		;
	}

	/**
	 * @dataProvider noOverflowProvider
	 */
	function testRecipientOfOperationWithOIntegerIs_withNoOverflow($ninteger1, $ninteger2, $noperation)
	{
		$this
			->given(
				$template = new mockOfTicTacToe\ointeger,

				$operation = new mockOfTicTacToe\ointeger,
				$this->calling($template)->recipientOfOIntegerWithValueIs = function($value, $recipient) use ($noperation, $operation) {
					if ($value == $noperation)
					{
						$recipient->ointegerIs($operation);
					}
				},

				$ointeger1 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger1) {
					$recipient->nintegerIs($ninteger1);
				},

				$ointeger2 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger2) {
					$recipient->nintegerIs($ninteger2);
				},

				$this->newTestedInstance($template, $ointeger1, $overflow = new mockOfTicTacToe\block),

				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerIs($ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $ointeger1, $overflow))
				->mock($recipient)
					->receive('ointegerIs')
						->withArguments($operation)
							->once
				->mock($overflow)
					->receive('blockArgumentsAre')
						->never
		;
	}

	/**
	 * @dataProvider overflowProvider
	 */
	function testRecipientOfOperationWithOIntegerIs_withOverflow($ninteger1, $ninteger2)
	{
		$this
			->given(
				$template = new mockOfTicTacToe\ointeger,

				$ointeger1 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger1) {
					$recipient->nintegerIs($ninteger1);
				},

				$ointeger2 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($ninteger2) {
					$recipient->nintegerIs($ninteger2);
				},

				$this->newTestedInstance($template, $ointeger1, $overflow = new mockOfTicTacToe\block),

				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerIs($ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $ointeger1, $overflow))
				->mock($recipient)
					->receive('ointegerIs')
						->never
				->mock($overflow)
					->receive('blockArgumentsAre')
						->once
		;
	}

}
