<?php namespace estvoyage\ticTacToe\tests\units\coordinate\place\generator;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class same extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\place\generator')
		;
	}

	function testRecipientOfPlaceInTicTacToeBoardFromPlaceIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$place = new mockOfTicTacToe\coordinate\place,
				$recipient = new mockOfTicTacToe\coordinate\place\recipient
			)
			->if(
				$this->testedInstance->recipientOfPlaceInTicTacToeBoardFromPlaceIs($place, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('placeInTicTacToeBoardIs')
						->withArguments($place)
							->once
		;
	}
}
