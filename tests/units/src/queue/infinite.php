<?php namespace estvoyage\ticTacToe\tests\units\queue;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class infinite extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\queue')
		;
	}


	function testRecipientOfQueueWithValueIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$value = uniqid(),
				$recipient = new mockOfTicTacToe\queue\recipient
			)
			->if(
				$this->testedInstance->recipientOfQueueWithValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('queueIs')
						->withArguments($this->newTestedInstance($value))
							->once
		;
	}

	function testRecipientOfValueInQueueIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfTicTacToe\queue\value\recipient
			)
			->if(
				$this->testedInstance->recipientOfValueInQueueIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('queueWithoutValueIs')
						->never

			->given(
				$this->newTestedInstance($value1 = uniqid(), $value2 = uniqid())
			)
			->if(
				$this->testedInstance->recipientOfValueInQueueIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value1, $value2))
				->mock($recipient)
					->receive('queueWithoutValueIs')
						->withArguments($value1, $this->newTestedInstance($value2))
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
						->withArguments($value1, $value2, $value3)
							->once
		;
	}
}
