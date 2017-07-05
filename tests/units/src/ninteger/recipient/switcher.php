<?php namespace estvoyage\ticTacToe\tests\units\ninteger\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class switcher extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\recipient')
		;
	}

	function testNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance(2, $recipient = new mockOfTicTacToe\ninteger\recipient, $otherRecipient = new mockOfTicTacToe\ninteger\recipient),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(1, $recipient, $otherRecipient))
				->mock($recipient)
					->receive('nintegerIs')
						->withArguments($ninteger)
							->once
				->mock($otherRecipient)
					->receive('nintegerIs')
						->never

			->given(
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(0, $recipient, $otherRecipient))
				->mock($recipient)
					->receive('nintegerIs')
						->once
				->mock($otherRecipient)
					->receive('nintegerIs')
						->withArguments($ninteger)
							->once

			->given(
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(0, $recipient, $otherRecipient))
				->mock($recipient)
					->receive('nintegerIs')
						->once
				->mock($otherRecipient)
					->receive('nintegerIs')
						->withArguments($ninteger)
							->once

			->given(
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->newTestedInstance($number = rand(PHP_INT_MIN, -1), $recipient, $otherRecipient)
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($number, $recipient, $otherRecipient))
				->mock($recipient)
					->receive('nintegerIs')
						->once
				->mock($otherRecipient)
					->receive('nintegerIs')
						->withArguments($ninteger)
							->once
		;
	}
}
