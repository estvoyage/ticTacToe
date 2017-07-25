<?php namespace estvoyage\ticTacToe\tests\units\coordinate;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate')
		;
	}

	function testRecipientOfPlaceInTicTacToeBoardRowsIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\coordinate\place, $column = new mockOfTicTacToe\coordinate\place),
				$recipient = new mockOfTicTacToe\coordinate\place\recipient
			)
			->if(
				$this->testedInstance->recipientOfPlaceInTicTacToeBoardRowsIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('placeInTicTacToeBoardIs')
						->withArguments($row)
							->once
		;
	}

	function testRecipientOfPlaceInTicTacToeBoardColumnsIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\coordinate\place, $column = new mockOfTicTacToe\coordinate\place),
				$recipient = new mockOfTicTacToe\coordinate\place\recipient
			)
			->if(
				$this->testedInstance->recipientOfPlaceInTicTacToeBoardColumnsIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('placeInTicTacToeBoardIs')
						->withArguments($column)
							->once
		;
	}
}
