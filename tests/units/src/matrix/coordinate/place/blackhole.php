<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\place;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate\place')
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
						->never
		;
	}
}
