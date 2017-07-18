<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, matrix };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate')
		;
	}

	function testRecipientOfPlaceInMatrixRowsIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\matrix\coordinate\place, $column = new mockOfTicTacToe\matrix\coordinate\place),
				$recipient = new mockOfTicTacToe\matrix\coordinate\place\recipient
			)
			->if(
				$this->testedInstance->recipientOfPlaceInMatrixRowsIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('placeInMatrixIs')
						->withArguments($row)
							->once
		;
	}

	function testRecipientOfPlaceInMatrixColumnsIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\matrix\coordinate\place, $column = new mockOfTicTacToe\matrix\coordinate\place),
				$recipient = new mockOfTicTacToe\matrix\coordinate\place\recipient
			)
			->if(
				$this->testedInstance->recipientOfPlaceInMatrixColumnsIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('placeInMatrixIs')
						->withArguments($column)
							->once
		;
	}

	function testRecipientOfMatrixCoordinateWithRowAndColumnIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\matrix\coordinate\place, $column = new mockOfTicTacToe\matrix\coordinate\place),
				$otherRow = new mockOfTicTacToe\matrix\coordinate\place,
				$otherColumn = new mockOfTicTacToe\matrix\coordinate\place,
				$recipient = new mockOfTicTacToe\matrix\coordinate\recipient
			)
			->if(
				$this->testedInstance->recipientOfMatrixCoordinateWithRowAndColumnIs($otherRow, $otherColumn, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('matrixCoordinateIs')
						->withArguments($this->newTestedInstance($otherRow, $otherColumn))
							->once
		;
	}
}
