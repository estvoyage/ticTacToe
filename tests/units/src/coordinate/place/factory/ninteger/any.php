<?php namespace estvoyage\ticTacToe\tests\units\coordinate\place\factory\ninteger;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, coordinate };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\place\factory\ninteger')
		;
	}

	function testRecipientOfPlaceInTicTacToeBoardBuildWithNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$ninteger = rand(1, PHP_INT_MAX),
				$recipient = new mockOfTicTacToe\coordinate\place\recipient
			)
			->if(
				$this->testedInstance->recipientOfPlaceInTicTacToeBoardBuildWithNIntegerIs($ninteger, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('placeInTicTacToeBoardIs')
						->withArguments(new coordinate\place\any($ninteger))
							->once

			->if(
				$ninteger = rand(PHP_INT_MIN, 0)
			)
			->then
				->exception(function() use ($ninteger, $recipient) { $this->testedInstance->recipientOfPlaceInTicTacToeBoardBuildWithNIntegerIs($ninteger, $recipient); })
					->isInstanceOf('typeError')
					->hasMessage('Value should be an integer greater than 0')
		;
	}
}
