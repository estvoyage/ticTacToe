<?php namespace estvoyage\ticTacToe\tests\units\matrix\value;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\value')
		;
	}

	function testRecipientOfMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($value = uniqid(), $coordinate = new mockOfTicTacToe\matrix\coordinate),
				$recipient = new mockOfTicTacToe\matrix\coordinate\recipient
			)
			->if(
				$this->testedInstance->recipientOfMatrixCoordinateIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value, $coordinate))
				->mock($recipient)
					->receive('matrixCoordinateIs')
						->withArguments($coordinate)
							->once
		;
	}

	function testRecipientOfMatrixValueIs()
	{
		$this
			->given(
				$this->newTestedInstance($value = uniqid(), $coordinate = new mockOfTicTacToe\matrix\coordinate),
				$recipient = new mockOfTicTacToe\matrix\value\recipient
			)
			->if(
				$this->testedInstance->recipientOfMatrixValueIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value, $coordinate))
				->mock($recipient)
					->receive('matrixValueIs')
						->withArguments($value)
							->once
		;
	}
}
