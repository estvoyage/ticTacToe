<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\forwarder;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, matrix };
use mock\estvoyage\ticTacToe\{ matrix as mockOfMatrix, block as mockOfBlock };

class places extends units\test
{
	function testClass()
	{
		$this->testedClass->implements('estvoyage\ticTacToe\matrix\coordinate\forwarder');
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(new matrix\coordinate\place\blackhole, new matrix\coordinate\place\blackhole));
	}

	function testMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfMatrix\coordinate\place, $column = new mockOfMatrix\coordinate\place),
				$coordinate = new mockOfMatrix\coordinate
			)
			->if(
				$this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))

			->given(
				$rowInMatrix = new mockOfMatrix\coordinate\place,
				$this->calling($coordinate)->recipientOfPlaceInMatrixRowsIs = function($recipient) use ($rowInMatrix) {
					$recipient->placeInMatrixIs($rowInMatrix);
				},

				$columnInMatrix = new mockOfMatrix\coordinate\place,
				$this->calling($coordinate)->recipientOfPlaceInMatrixColumnsIs = function($recipient) use ($columnInMatrix) {
					$recipient->placeInMatrixIs($columnInMatrix);
				}
			)
			->if(
				$withRowAndColumnInMatrix = $this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->object($withRowAndColumnInMatrix)
					->isEqualTo($this->newTestedInstance($rowInMatrix, $columnInMatrix))
		;
	}

	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($row = new mockOfMatrix\coordinate\place, $column = new mockOfMatrix\coordinate\place),
				$block = new mockOfBlock
			)
			->if(
				$forwarder = $this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($row, $column))
				->object($forwarder)
					->isEqualTo($this->newTestedInstance($row, $column))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($row, $column)
							->once
		;
	}
}
