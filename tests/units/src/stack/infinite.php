<?php namespace estvoyage\ticTacToe\tests\units\stack;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class infinite extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\stack')
		;
	}


	function testRecipientOfStackWithValueIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$value = uniqid(),
				$recipient = new mockOfTicTacToe\stack\recipient
			)
			->if(
				$this->testedInstance->recipientOfStackWithValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stackIs')
						->withArguments($this->newTestedInstance($value))
							->once
		;
	}

	function testRecipientOfValueInStackIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfTicTacToe\stack\value\recipient
			)
			->if(
				$this->testedInstance->recipientOfValueInStackIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('stackWithoutValueIs')
						->never

			->given(
				$this->newTestedInstance($value1 = uniqid(), $value2 = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfValueInStackIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value1, $value2))
				->mock($recipient)
					->receive('stackWithoutValueIs')
						->withArguments($value2, $this->newTestedInstance($value1))
							->once
		;
	}

	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments()
							->once

			->given(
				$this->newTestedInstance($value1 = uniqid(), $value2 = uniqid(), $value3 = uniqid())
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value1, $value2, $value3))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($value3, $value2, $value1)
							->once
		;
	}
}
