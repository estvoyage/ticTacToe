<?php namespace estvoyage\ticTacToe\tests\units\queue\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\queue\recipient')
		;
	}

	function testQueueIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$queue = new mockOfTicTacToe\queue
			)
			->if(
				$this->testedInstance->queueIs($queue)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $queue ])
		;
	}
}
