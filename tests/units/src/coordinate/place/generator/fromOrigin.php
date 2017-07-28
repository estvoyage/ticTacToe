<?php namespace estvoyage\ticTacToe\tests\units\coordinate\place\generator;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class fromOrigin extends units\test
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
				$this->newTestedInstance($factory = new mockOfTicTacToe\coordinate\place\factory\ninteger),
				$place = new mockOfTicTacToe\coordinate\place,
				$recipient = new mockOfTicTacToe\coordinate\place\recipient
			)
			->if(
				$this->testedInstance->recipientOfPlaceInTicTacToeBoardFromPlaceIs($place, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($factory))
				->mock($factory)
					->receive('recipientOfPlaceInTicTacToeBoardBuildWithNIntegerIs')
						->never

			->given(
				$this->calling($place)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(3);
				}
			)
			->if(
				$this->testedInstance->recipientOfPlaceInTicTacToeBoardFromPlaceIs($place, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($factory))
				->mock($factory)
					->receive('recipientOfPlaceInTicTacToeBoardBuildWithNIntegerIs')
						->withArguments(3, $recipient)
							->once
		;
	}
}
