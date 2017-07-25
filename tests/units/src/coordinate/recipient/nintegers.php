<?php namespace estvoyage\ticTacToe\tests\units\coordinate\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class nintegers extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\recipient')
		;
	}

	function testCoordinateInTicTacToeBoardIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$coordinate = new mockOfTicTacToe\coordinate
			)
			->if(
				$this->testedInstance->coordinateInTicTacToeBoardIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$rowInBoard = new mockOfTicTacToe\coordinate\place,

				$rowInBoardAsNinteger = rand(1, PHP_INT_MAX),
				$this->calling($rowInBoard)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($rowInBoardAsNinteger) {
					$recipient->nintegerIs($rowInBoardAsNinteger);
				},

				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($rowInBoard) {
					$recipient->placeInTicTacToeBoardIs($rowInBoard);
				},

				$columnInBoard = new mockOfTicTacToe\coordinate\place,

				$columnInBoardAsNinteger = rand(1, PHP_INT_MAX),
				$this->calling($columnInBoard)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($columnInBoardAsNinteger) {
					$recipient->nintegerIs($columnInBoardAsNinteger);
				},

				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($columnInBoard) {
					$recipient->placeInTicTacToeBoardIs($columnInBoard);
				}
			)
			->if(
				$this->testedInstance->coordinateInTicTacToeBoardIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($rowInBoardAsNinteger, $columnInBoardAsNinteger)
							->once
		;
	}
}
