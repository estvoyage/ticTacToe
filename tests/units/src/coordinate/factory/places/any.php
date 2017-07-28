<?php namespace estvoyage\ticTacToe\tests\units\coordinate\factory\places;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, coordinate };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\factory\places')
		;
	}

	function testRecipientOfTicTacToeCoordinateWithRowAndColumnIs()
	{
		$this
			->given(
				$this->newTestedInstance,
				$row = new mockOfTicTacToe\coordinate\place,
				$column = new mockOfTicTacToe\coordinate\place,
				$recipient = new mockOfTicTacToe\coordinate\recipient
			)
			->if(
				$this->newTestedInstance->recipientOfTicTacToeCoordinateWithRowAndColumnIs($row, $column, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('coordinateInTicTacToeBoardIs')
						->withArguments(new coordinate\any($row, $column))
							->once
		;
	}
}
