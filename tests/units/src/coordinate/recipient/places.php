<?php namespace estvoyage\ticTacToe\tests\units\coordinate\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, coordinate };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class places extends units\test
{
	function testClass()
	{
		$this->testedClass->implements('estvoyage\ticTacToe\coordinate\recipient');
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance($block = new mockOfTicTacToe\block))->isEqualTo($this->newTestedInstance($block, new coordinate\place\blackhole, new coordinate\place\blackhole));
	}

	function testCoordinateInTicTacToeBoardIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block, $row = new mockOfTicTacToe\coordinate\place, $column = new mockOfTicTacToe\coordinate\place),
				$coordinate = new mockOfTicTacToe\coordinate
			)
			->if(
				$this->testedInstance->coordinateInTicTacToeBoardIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $row, $column))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($row, $column)
							->once

			->given(
				$rowInBoard = new mockOfTicTacToe\coordinate\place,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($rowInBoard) {
					$recipient->placeInTicTacToeBoardIs($rowInBoard);
				},

				$columnInBoard = new mockOfTicTacToe\coordinate\place,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($columnInBoard) {
					$recipient->placeInTicTacToeBoardIs($columnInBoard);
				}
			)
			->if(
				$this->testedInstance->coordinateInTicTacToeBoardIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $row, $column))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($rowInBoard, $columnInBoard)
							->once
		;
	}
}
