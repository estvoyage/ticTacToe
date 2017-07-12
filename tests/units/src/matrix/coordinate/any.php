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

	function testRecipientOfRowInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\matrix\coordinate\distance, $column = new mockOfTicTacToe\matrix\coordinate\distance),
				$recipient = new mockOfTicTacToe\matrix\coordinate\row\recipient
			)
			->if(
				$this->testedInstance->recipientOfRowInMatrixIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('rowInMatrixIs')
						->withArguments($row)
							->once
		;
	}

	function testRecipientOfColumnInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\matrix\coordinate\distance, $column = new mockOfTicTacToe\matrix\coordinate\distance),
				$recipient = new mockOfTicTacToe\matrix\coordinate\column\recipient
			)
			->if(
				$this->testedInstance->recipientOfColumnInMatrixIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('columnInMatrixIs')
						->withArguments($column)
							->once
		;
	}
}
