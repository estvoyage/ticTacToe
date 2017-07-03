<?php namespace estvoyage\ticTacToe\tests\units\ninteger\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, block };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class addition extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\operation\unary')
		;
	}

	function test__construct()
	{
		$this
			->given(
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->newTestedInstance($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger, new block\blackhole))
		;
	}

	/**
	 * @dataProvider noOverflowProvider
	 */
	function testRecipientOfOperationWithNIntegerIs_withNoOverflow($ninteger1, $ninteger2, $operation)
	{
		$this
			->given(
				$this->newTestedInstance($ninteger1, $overflow = new mockOfTicTacToe\block),
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerIs($ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger1, $overflow))
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
				$this->newTestedInstance($ninteger1, $overflow = new mockOfTicTacToe\block),
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithNIntegerIs($ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger1, $overflow))
				->mock($recipient)
					->receive('nintegerIs')
						->never
				->mock($overflow)
					->receive('blockArgumentsAre')
						->once
		;
	}

	protected function noOverflowProvider()
	{
		return [
			[ 0, 0, 0 ],
			[ 0, 1, 1 ],
			[ 1, 0, 1 ],
			[ 3, 2, 5 ],
			[ 2, 3, 5 ],
			[ -2, 3, 1 ],
			[ 3, -2, 1 ],
			[ -3, -2, -5 ],
			[ -2, -3, -5 ]
		];
	}

	protected function overflowProvider()
	{
		return [
			[ PHP_INT_MAX, 1 ],
			[ PHP_INT_MIN, -1 ]
		];
	}
}
