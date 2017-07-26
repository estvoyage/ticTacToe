<?php namespace estvoyage\ticTacToe\tests\units\board\view;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, ostring };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class output extends units\test
{
	function testTicTacToeBoardIs()
	{
		$this
			->given(
				$this->newTestedInstance($output = new mockOfTicTacToe\output),

				$lines = [],

				$this->calling($output)->newLineForOutputIs = function($line) use (& $lines) {
					$lines[] = $line;
				},

				$board = new mockOfTicTacToe\board
			)
			->if(
				$this->testedInstance->ticTacToeBoardIs($board)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($output))
				->array($lines)
					->isEmpty

			->given(
				$maxRow = new mockOfTicTacToe\coordinate\place,
				$this->calling($maxRow)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(3);
				},

				$maxColumn = new mockOfTicTacToe\coordinate\place,
				$this->calling($maxColumn)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {

					$recipient->nintegerIs(3);
				},
				$maxCoordinate = new mockOfTicTacToe\coordinate,
				$this->calling($maxCoordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($maxRow) {
					$recipient->placeInTicTacToeBoardIs($maxRow);
				},
				$this->calling($maxCoordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($maxColumn) {
					$recipient->placeInTicTacToeBoardIs($maxColumn);
				},

				$this->calling($board)->recipientOfMaximumCoordinateOfTicTacToeBoardIs = function($recipient) use ($maxCoordinate) {
					$recipient->coordinateInTicTacToeBoardIs($maxCoordinate);
				}
			)
			->if(
				$this->testedInstance->ticTacToeBoardIs($board)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($output))
				->array($lines)
					->isEqualTo(
						[
							new ostring\any('1|2|3'),
							new ostring\any('-+-+-'),
							new ostring\any('4|5|6'),
							new ostring\any('-+-+-'),
							new ostring\any('7|8|9'),
						]
					)

			->given(
				$lines = [],

				$symbol = new mockOfTicTacToe\symbol,

				$this->calling($board)->recipientOfTicTacToeSymbolAtCoordinateIs = function($coordinate, $recipient) use ($symbol) {
					$recipient->ticTacToeSymbolIs($symbol);
				}
			)
			->if(
				$this->testedInstance->ticTacToeBoardIs($board)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($output))
				->array($lines)
					->isEqualTo(
						[
							new ostring\any('1|2|3'),
							new ostring\any('-+-+-'),
							new ostring\any('4|5|6'),
							new ostring\any('-+-+-'),
							new ostring\any('7|8|9'),
						]
					)


			->given(
				$lines = [],

				$symbol = new mockOfTicTacToe\symbol,
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsX();
				},

				$this->calling($board)->recipientOfTicTacToeSymbolAtCoordinateIs = function($coordinate, $recipient) use ($symbol) {
					$recipient->ticTacToeSymbolIs($symbol);
				}
			)
			->if(
				$this->testedInstance->ticTacToeBoardIs($board)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($output))
				->array($lines)
					->isEqualTo(
						[
							new ostring\any('X|X|X'),
							new ostring\any('-+-+-'),
							new ostring\any('X|X|X'),
							new ostring\any('-+-+-'),
							new ostring\any('X|X|X'),
						]
					)

			->given(
				$lines = [],

				$symbol = new mockOfTicTacToe\symbol,
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsO();
				},

				$this->calling($board)->recipientOfTicTacToeSymbolAtCoordinateIs = function($coordinate, $recipient) use ($symbol) {
					$recipient->ticTacToeSymbolIs($symbol);
				}
			)
			->if(
				$this->testedInstance->ticTacToeBoardIs($board)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($output))
				->array($lines)
					->isEqualTo(
						[
							new ostring\any('O|O|O'),
							new ostring\any('-+-+-'),
							new ostring\any('O|O|O'),
							new ostring\any('-+-+-'),
							new ostring\any('O|O|O'),
						]
					)
		;
	}
}
