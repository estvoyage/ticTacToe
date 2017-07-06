<?php namespace estvoyage\ticTacToe\tests\units\condition;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifTrueError extends units\test
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
			->exception(
				function() use (& $error) {
					$this->newTestedInstance($error = new \mock\error)->nbooleanIs(true);
				}
			)
				->isIdenticalTo($error)
		;
	}

	function testRecipientOfConditionWithArgumentsIs()
	{
		$this
			->given(
				$this->newTestedInstance($error = new \mock\error),
				$arguments = [ '', uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), null, true, false, [], new \stdClass ],
				$recipient = new mockOfTicTacToe\condition\recipient
			)
			->if(
				$this->testedInstance->recipientOfConditionWithArgumentsIs($arguments, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($error))
				->mock($recipient)
					->receive('conditionIs')
						->withArguments($this->testedInstance)
							->once
		;
	}
}
