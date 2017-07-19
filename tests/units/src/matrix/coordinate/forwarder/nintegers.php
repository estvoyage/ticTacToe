<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\forwarder;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe\{ matrix as mockOfMatrix, block as mockOfBlock };

class nintegers extends units\test
{
	function testClass()
	{
		$this->testedClass->implements('estvoyage\ticTacToe\matrix\coordinate\forwarder');
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(null, null));
	}

	function testMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($rowAsNInteger = null, $columnAsNInteger = null),
				$coordinate = new mockOfMatrix\coordinate
			)
			->if(
				$this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($rowAsNInteger, $columnAsNInteger))

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
				$withRowAndColumnInMatrixAsNInteger = $this->testedInstance->matrixCoordinateIs($coordinate)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($rowAsNInteger, $columnAsNInteger))
				->object($withRowAndColumnInMatrixAsNInteger)
					->isEqualTo($this->newTestedInstance($rowInMatrixAsNinteger, $columnInMatrixAsNinteger))
		;
	}

	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($rowAsNInteger = null, $columnAsNInteger = null),
				$block = new mockOfBlock
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($rowAsNInteger, $columnAsNInteger))
				->mock($block)
					->receive('blockArgumentsAre')
						->never

			->given(
				$this->newTestedInstance($rowAsNInteger = rand(1, PHP_INT_MAX), $columnAsNInteger = rand(1, PHP_INT_MAX))
			)
			->if(
				$forwarder = $this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($rowAsNInteger, $columnAsNInteger))
				->object($forwarder)
					->isEqualTo($this->newTestedInstance($rowAsNInteger, $columnAsNInteger))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($rowAsNInteger, $columnAsNInteger)
							->once
		;
	}
}
