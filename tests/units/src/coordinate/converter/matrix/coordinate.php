<?php namespace estvoyage\ticTacToe\tests\units\coordinate\converter\matrix;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, coordinate\place, matrix };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class coordinate extends units\test
{
	function testMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($template = new mockOfTicTacToe\matrix\coordinate, $recipient = new mockOfTicTacToe\matrix\coordinate\recipient),
				$coordinate = new mockOfTicTacToe\coordinate
			)
			->if(
				$this->testedInstance->ticTacToeCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $recipient))
				->mock($recipient)
					->receive('matrixCoordinateIs')
						->never

			->given(
				$rowValue = rand(1, PHP_INT_MAX),
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($rowValue) {
					$recipient->placeInTicTacToeBoardIs(new place\any($rowValue));
				},

				$columnValue = rand(1, PHP_INT_MAX),
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($columnValue) {
					$recipient->placeInTicTacToeBoardIs(new place\any($columnValue));
				},

				$matrixCoordinate = new mockOfTicTacToe\matrix\coordinate,
				$this->calling($template)->recipientOfMatrixCoordinateWithRowAndColumnIs = function($aRow, $aColumn, $recipient) use ($rowValue, $columnValue, $matrixCoordinate) {
					if ($aRow == new matrix\coordinate\place\any($rowValue) && $aColumn == new matrix\coordinate\place\any($columnValue))
					{
						$recipient->matrixCoordinateIs($matrixCoordinate);
					}
				}
			)
			->if(
				$this->testedInstance->ticTacToeCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($template, $recipient))
				->mock($recipient)
					->receive('matrixCoordinateIs')
						->withArguments($matrixCoordinate)
							->once
		;
	}
}
