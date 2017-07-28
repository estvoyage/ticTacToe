<?php namespace estvoyage\ticTacToe\tests\units\coordinate\converter\ostring;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, ostring };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class row extends units\test
{
	function testRecipientOfOStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($recipient = new mockOfTicTacToe\ostring\recipient, $symbol = new mockOfTicTacToe\ostring, $separator = new mockOfTicTacToe\ostring),
				$coordinate = new mockOfTicTacToe\coordinate
			)
			->if(
				$this->testedInstance->coordinateInTicTacToeBoardIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $symbol, $separator))
				->mock($recipient)
					->receive('ostringIs')
						->withArguments(new ostring\any(''))
							->once

			->given(
				$nstringOfSymbol = uniqid(),
				$this->calling($symbol)->recipientOfNStringIs = function($recipient) use  ($nstringOfSymbol) {
					$recipient->nstringIs($nstringOfSymbol);
				},

				$nstringOfSeparator = uniqid(),
				$this->calling($separator)->recipientOfNStringIs = function($recipient) use  ($nstringOfSeparator) {
					$recipient->nstringIs($nstringOfSeparator);
				},

				$row = new mockOfTicTacToe\coordinate\place,

				$valueOfRow = 1,
				$this->calling($row)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($valueOfRow) {
					$recipient->nintegerIs($valueOfRow);
				},

				$column = new mockOfTicTacToe\coordinate\place,

				$valueOfColumn = 3,
				$this->calling($column)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($valueOfColumn) {
					$recipient->nintegerIs($valueOfColumn);
				},

				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($row) {
					$recipient->placeInTicTacToeBoardIs($row);
				},
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($column) {
					$recipient->placeInTicTacToeBoardIs($column);
				}
			)
			->if(
				$this->testedInstance->coordinateInTicTacToeBoardIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $symbol, $separator))
				->mock($recipient)
					->receive('ostringIs')
						->withArguments(new ostring\any($nstringOfSymbol . $nstringOfSeparator . $nstringOfSymbol . $nstringOfSeparator . $nstringOfSymbol))
							->once
		;
	}
}
