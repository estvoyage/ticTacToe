<?php namespace estvoyage\ticTacToe\tests\units\block\argument;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class queue extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\block\argument')
		;
	}

	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($queue = new mockOfTicTacToe\queue),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($queue))
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$arguments = [ uniqid(), uniqid() ],
				$this->calling($queue)->blockIs = function($block) use ($arguments) {
					$block->blockArgumentsAre(... $arguments);
				}
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($queue))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
		;
	}

	function testRecipientOfBlockArgumentWithValueIs()
	{
		$this
			->given(
				$this->newTestedInstance($queue = new mockOfTicTacToe\queue),
				$value = uniqid(),
				$recipient = new mockOfTicTacToe\block\argument\recipient
			)
			->if(
				$this->testedInstance->recipientOfBlockArgumentWithValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($queue))
				->mock($recipient)
					->receive('argumentForBlockIs')
						->never

			->given(
				$queueWithValue = new mockOfTicTacToe\queue,
				$this->calling($queue)->recipientOfQueueWithValueIs = function($aValue, $recipient) use ($value, $queueWithValue) {
					if ($aValue == $value)
					{
						$recipient->queueIs($queueWithValue);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfBlockArgumentWithValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($queue))
				->mock($recipient)
					->receive('argumentForBlockIs')
						->withArguments($this->newTestedInstance($queueWithValue))
							->once
		;
	}
}
