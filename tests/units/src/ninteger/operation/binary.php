<?php namespace estvoyage\ticTacToe\tests\units\ninteger\operation;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, block };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

abstract class binary extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\operation\binary')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new block\blackhole));
	}

	/**
	 * @dataProvider noOverflowProvider
	 */
	function testRecipientOfOperationWithNIntegerAndNIntegerIs_withNoOverflow($ninteger1, $ninteger2, $operation)
	{
		$this
			->given(
				$this->newTestedInstance($overflow = new mockOfTicTacToe\block),
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerAndNIntegerIs($ninteger1, $ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($overflow))
				->mock($recipient)
					->receive('nintegerIs')
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
	function testRecipientOfOperationWithNIntegerIs_withOverflow($ninteger1, $ninteger2)
	{
		$this
			->given(
				$this->newTestedInstance($overflow = new mockOfTicTacToe\block),
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerAndNIntegerIs($ninteger1, $ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($overflow))
				->mock($recipient)
					->receive('nintegerIs')
						->never
				->mock($overflow)
					->receive('blockArgumentsAre')
						->once
		;
	}

	protected abstract function noOverflowProvider();
	protected abstract function overflowProvider();
}
