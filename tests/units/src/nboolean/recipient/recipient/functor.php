<?php namespace estvoyage\ticTacToe\tests\units\nboolean\recipient\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\nboolean\recipient\recipient')
		;
	}

	function testNBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$recipient = new mockOfTicTacToe\nboolean\recipient
			)
			->if(
				$this->testedInstance->nbooleanRecipientIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $recipient ])
		;
	}
}
