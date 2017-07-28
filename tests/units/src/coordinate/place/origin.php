<?php namespace estvoyage\ticTacToe\tests\units\coordinate\place;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class origin extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\place')
		;
	}

	function testRecipientOfNIntegerGreaterThanZeroIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->testedInstance->recipientOfNIntegerGreaterThanZeroIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('nintegerIs')
						->withArguments(1)
							->once
		;
	}
}
