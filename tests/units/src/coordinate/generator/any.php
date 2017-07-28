<?php namespace estvoyage\ticTacToe\tests\units\coordinate\generator;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testRecipientOfTicTacToeCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance(
					$factory = new mockOfTicTacToe\coordinate\factory\places,
					$rowGenerator = new mockOfTicTacToe\coordinate\place\generator,
					$columnGenerator = new mockOfTicTacToe\coordinate\place\generator
				),
				$coordinate = new mockOfTicTacToe\coordinate,
				$recipient = new mockOfTicTacToe\coordinate\recipient
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeCoordinateFromCoordinateIs($coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($factory, $rowGenerator, $columnGenerator))
				->mock($factory)
					->receive('recipientOfTicTacToeCoordinateWithRowAndColumnIs')
						->never

			->given(
				$row = new mockOfTicTacToe\coordinate\place,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($row) {
					$recipient->placeInTicTacToeBoardIs($row);
				},

				$column = new mockOfTicTacToe\coordinate\place,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($column) {
					$recipient->placeInTicTacToeBoardIs($column);
				},

				$rowFromGenerator1 = new mockOfTicTacToe\coordinate\place,
				$rowFromGenerator2 = new mockOfTicTacToe\coordinate\place,
				$rowFromGenerator3 = new mockOfTicTacToe\coordinate\place,
				$this->calling($rowGenerator)->recipientOfPlaceInTicTacToeBoardFromPlaceIs = function($place, $recipient) use ($row, $rowFromGenerator1, $rowFromGenerator2, $rowFromGenerator3) {
					if ($place == $row)
					{
						$recipient->placeInTicTacToeBoardIs($rowFromGenerator1);
						$recipient->placeInTicTacToeBoardIs($rowFromGenerator2);
						$recipient->placeInTicTacToeBoardIs($rowFromGenerator3);
					}
				},

				$columnFromGenerator1 = new mockOfTicTacToe\coordinate\place,
				$columnFromGenerator2 = new mockOfTicTacToe\coordinate\place,
				$columnFromGenerator3 = new mockOfTicTacToe\coordinate\place,
				$this->calling($columnGenerator)->recipientOfPlaceInTicTacToeBoardFromPlaceIs = function($place, $recipient) use ($column, $columnFromGenerator1, $columnFromGenerator2, $columnFromGenerator3) {
					if ($place == $column)
					{
						$recipient->placeInTicTacToeBoardIs($columnFromGenerator1);
						$recipient->placeInTicTacToeBoardIs($columnFromGenerator2);
						$recipient->placeInTicTacToeBoardIs($columnFromGenerator3);
					}
				}
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeCoordinateFromCoordinateIs($coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($factory, $rowGenerator, $columnGenerator))
				->mock($factory)
					->receive('recipientOfTicTacToeCoordinateWithRowAndColumnIs')
						->withArguments($rowFromGenerator1, $columnFromGenerator1, $recipient)
							->once
						->withArguments($rowFromGenerator1, $columnFromGenerator2, $recipient)
							->once
						->withArguments($rowFromGenerator1, $columnFromGenerator3, $recipient)
							->once
						->withArguments($rowFromGenerator2, $columnFromGenerator1, $recipient)
							->once
						->withArguments($rowFromGenerator2, $columnFromGenerator2, $recipient)
							->once
						->withArguments($rowFromGenerator2, $columnFromGenerator3, $recipient)
							->once
						->withArguments($rowFromGenerator3, $columnFromGenerator1, $recipient)
							->once
						->withArguments($rowFromGenerator3, $columnFromGenerator2, $recipient)
							->once
						->withArguments($rowFromGenerator3, $columnFromGenerator3, $recipient)
							->once
		;
	}
}
