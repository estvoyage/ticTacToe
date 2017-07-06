<?php namespace estvoyage\ticTacToe\tests\units\condition;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\condition')
		;
	}

	function testNbooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$boolean = rand(0, 1) == 1
			)
			->if(
				$this->testedInstance->nbooleanIs($boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $boolean ])
		;
	}

	function testRecipientOfConditionWithArgumentsIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() {}),
				$recipient = new mockOfTicTacToe\condition\recipient,
				$arguments = [ '', uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), null, true, false, [], new \stdClass ]
			)
			->if(
				$this->testedInstance->recipientOfConditionWithArgumentsIs($arguments, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->mock($recipient)
					->receive('conditionIs')
						->withArguments($this->testedInstance)
							->once
		;
	}
}
