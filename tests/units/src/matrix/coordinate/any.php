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

	function testRecipientOfDistanceInMatrixRowIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\matrix\coordinate\distance, $column = new mockOfTicTacToe\matrix\coordinate\distance),
				$recipient = new mockOfTicTacToe\matrix\coordinate\distance\recipient
			)
			->if(
				$this->testedInstance->recipientOfDistanceInMatrixRowIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('distanceInMatrixIs')
						->withArguments($row)
							->once
		;
	}

	function testRecipientOfDistanceInMatrixColumnIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfTicTacToe\matrix\coordinate\distance, $column = new mockOfTicTacToe\matrix\coordinate\distance),
				$recipient = new mockOfTicTacToe\matrix\coordinate\distance\recipient
			)
			->if(
				$this->testedInstance->recipientOfDistanceInMatrixColumnIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($recipient)
					->receive('distanceInMatrixIs')
						->withArguments($column)
							->once
		;
	}
}
