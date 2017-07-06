<?php namespace estvoyage\ticTacToe\tests\units\condition;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\condition')
		;
	}

	function testNBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$boolean = rand(0, 1) == 1
			)
			->if(
				$this->testedInstance->nbooleanIs($boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($boolean)
							->once
		;
	}

	function testRecipientOfConditionWithArgumentsIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$recipient = new mockOfTicTacToe\condition\recipient,
				$arguments = [ '', uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), null, true, false, [], new \stdClass ]
			)
			->if(
				$this->testedInstance->recipientOfConditionWithArgumentsIs($arguments, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($recipient)
					->receive('conditionIs')
						->withArguments($this->testedInstance)
							->once
		;
	}
}
