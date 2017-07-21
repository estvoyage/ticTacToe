<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe\{ matrix as mockOfMatrix, block as mockOfBlock };

class nintegers extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\coordinate\recipient')
		;
	}

	function testMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfBlock),
				$coordinate = new mockOfMatrix\coordinate
			)
			->if(
				$this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$rowInMatrix = new mockOfMatrix\coordinate\place,

				$rowInMatrixAsNinteger = rand(1, PHP_INT_MAX),
				$this->calling($rowInMatrix)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($rowInMatrixAsNinteger) {
					$recipient->nintegerIs($rowInMatrixAsNinteger);
				},

				$this->calling($coordinate)->recipientOfPlaceInMatrixRowsIs = function($recipient) use ($rowInMatrix) {
					$recipient->placeInMatrixIs($rowInMatrix);
				},

				$columnInMatrix = new mockOfMatrix\coordinate\place,

				$columnInMatrixAsNinteger = rand(1, PHP_INT_MAX),
				$this->calling($columnInMatrix)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($columnInMatrixAsNinteger) {
					$recipient->nintegerIs($columnInMatrixAsNinteger);
				},

				$this->calling($coordinate)->recipientOfPlaceInMatrixColumnsIs = function($recipient) use ($columnInMatrix) {
					$recipient->placeInMatrixIs($columnInMatrix);
				}
			)
			->if(
				$this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($rowInMatrixAsNinteger, $columnInMatrixAsNinteger)
							->once
		;
	}
}
