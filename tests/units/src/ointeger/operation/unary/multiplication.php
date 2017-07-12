<?php namespace estvoyage\ticTacToe\tests\units\ointeger\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, block };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class multiplication extends units\test
{
	use units\data\provider\ninteger\multiplication;

	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\operation\unary')
		;
	}

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
	function testRecipientOfOperationWithOIntegerIs_withNoOverflow($ointager1Value, $ointager2Value, $operationValue)
	{
		$this
			->given(
				$ointeger1 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointager1Value) {
					$recipient->nintegerIs($ointager1Value);
				},

				$ointeger2 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointager2Value) {
					$recipient->nintegerIs($ointager2Value);
				},

				$template = new mockOfTicTacToe\ointeger,
				$operation = new mockOfTicTacToe\ointeger,
				$this->calling($template)->recipientOfOIntegerWithValueIs = function($aValue, $recipient) use ($operationValue, $operation) {
					if ($aValue == $operationValue)
					{
						$recipient->ointegerIs($operation);
					}
				},

				$recipient = new mockOfTicTacToe\ointeger\recipient,

				$this->newTestedInstance($template, $ointeger1, $overflow = new mockOfTicTacToe\block)
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerIs($ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $ointeger1, $overflow))
				->mock($overflow)
					->receive('blockArgumentsAre')
						->never
				->mock($recipient)
					->receive('ointegerIs')
						->withArguments($operation)
							->once
		;
	}

	/**
	 * @dataProvider overflowProvider
	 */
	function testRecipientOfOperationWithOIntegerIs_withOverflow($ointager1Value, $ointager2Value)
	{
		$this
			->given(
				$ointeger1 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger1)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointager1Value) {
					$recipient->nintegerIs($ointager1Value);
				},

				$ointeger2 = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger2)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointager2Value) {
					$recipient->nintegerIs($ointager2Value);
				},

				$template = new mockOfTicTacToe\ointeger,
				$this->calling($template)->recipientOfOIntegerWithValueIs = function($aValue, $recipient) {
					$recipient->ointegerIs(new mockOfTicTacToe\ointeger);
				},

				$recipient = new mockOfTicTacToe\ointeger\recipient,

				$this->newTestedInstance($template, $ointeger1, $overflow = new mockOfTicTacToe\block)
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOIntegerIs($ointeger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $ointeger1, $overflow))
				->mock($overflow)
					->receive('blockArgumentsAre')
						->withArguments()
							->once
				->mock($recipient)
					->receive('ointegerIs')
						->never
		;
	}
}
