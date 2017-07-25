<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, matrix };
use mock\estvoyage\ticTacToe\{ matrix as mockOfMatrix, block as mockOfBlock };

class places extends units\test
{
	function testClass()
	{
		$this->testedClass->implements('estvoyage\ticTacToe\matrix\coordinate\recipient');
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance($block = new mockOfBlock))->isEqualTo($this->newTestedInstance($block, new matrix\coordinate\place\blackhole, new matrix\coordinate\place\blackhole));
	}

	function testMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfBlock, $row = new mockOfMatrix\coordinate\place, $column = new mockOfMatrix\coordinate\place),
				$coordinate = new mockOfMatrix\coordinate
			)
			->if(
				$this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $row, $column))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($row, $column)
							->once

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
				$this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $row, $column))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($rowInMatrix, $columnInMatrix)
							->once
		;
	}
}
