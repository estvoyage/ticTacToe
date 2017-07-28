<?php namespace estvoyage\ticTacToe\tests\units\ostring\factory\nstring;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, ostring };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ostring\factory\nstring')
		;
	}

	function testRecipientOfOStringWithNStringIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$nstring = uniqid(),
				$recipient = new mockOfTicTacToe\ostring\recipient
			)
			->if(
				$this->testedInstance->recipientOfOStringWithNStringIs($nstring, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('ostringIs')
						->withArguments(new ostring\any($nstring))
							->once
		;
	}
}
