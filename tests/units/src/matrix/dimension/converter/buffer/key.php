<?php namespace estvoyage\ticTacToe\tests\units\matrix\dimension\converter\buffer;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, buffer, matrix };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class key extends units\test
{
	/**
	 * @dataProvider validDimensionCoordinateAndKeyProvider
	 */
	function testMatrixDimensionIs_withValidCoordinate($dimensionRow, $dimensionColumn, $coordinateRow, $coordinateColumn, $key)
	{
		$this
			->given(
				$dimension = new mockOfTicTacToe\matrix\dimension,
				$this->calling($dimension)->recipientOfNumberOfRowsInMatrixIs = function($recipient) use ($dimensionRow) {
					$recipient->numberOfRowsInMatrixIs($dimensionRow);
				},
				$this->calling($dimension)->recipientOfNumberOfColumnsInMatrixIs = function($recipient) use ($dimensionColumn) {
					$recipient->numberOfColumnsInMatrixIs($dimensionColumn);
				},

				$coordinate = new mockOfTicTacToe\matrix\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) use ($coordinateRow) {
					$recipient->rowInMatrixIs($coordinateRow);
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) use ($coordinateColumn) {
					$recipient->columnInMatrixIs($coordinateColumn);
				},

				$this->newTestedInstance($recipient = new mockOfTicTacToe\buffer\key\recipient, $coordinate)
			)
			->if(
				$this->testedInstance->matrixDimensionIs($dimension)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $coordinate))
				->mock($recipient)
					->receive('bufferKeyIs')
						->withArguments($key)
							->once
		;
	}

	/**
	 * @dataProvider invalidDimensionCoordinateAndKeyProvider
	 */
	function testMatrixDimensionIs_withInvalidCoordinate($dimensionRow, $dimensionColumn, $coordinateRow, $coordinateColumn)
	{
		$this
			->given(
				$dimension = new mockOfTicTacToe\matrix\dimension,
				$this->calling($dimension)->recipientOfNumberOfRowsInMatrixIs = function($recipient) use ($dimensionRow) {
					$recipient->numberOfRowsInMatrixIs($dimensionRow);
				},
				$this->calling($dimension)->recipientOfNumberOfColumnsInMatrixIs = function($recipient) use ($dimensionColumn) {
					$recipient->numberOfColumnsInMatrixIs($dimensionColumn);
				},

				$coordinate = new mockOfTicTacToe\matrix\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) use ($coordinateRow) {
					$recipient->rowInMatrixIs($coordinateRow);
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) use ($coordinateColumn) {
					$recipient->columnInMatrixIs($coordinateColumn);
				},

				$this->newTestedInstance($recipient = new mockOfTicTacToe\buffer\key\recipient, $coordinate)
			)
			->if(
				$this->testedInstance->matrixDimensionIs($dimension)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient, $coordinate))
				->mock($recipient)
					->receive('bufferKeyIs')
						->never
		;
	}

	protected function validDimensionCoordinateAndKeyProvider()
	{
		return [
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(0), new matrix\coordinate\distance\any(0), new buffer\key(0) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(0), new matrix\coordinate\distance\any(1), new buffer\key(1) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(0), new matrix\coordinate\distance\any(2), new buffer\key(2) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(1), new matrix\coordinate\distance\any(0), new buffer\key(3) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(1), new matrix\coordinate\distance\any(1), new buffer\key(4) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(1), new matrix\coordinate\distance\any(2), new buffer\key(5) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(2), new matrix\coordinate\distance\any(0), new buffer\key(6) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(2), new matrix\coordinate\distance\any(1), new buffer\key(7) ],
			[ new matrix\dimension\side\any(3), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(2), new matrix\coordinate\distance\any(2), new buffer\key(8) ],
		];
	}

	protected function invalidDimensionCoordinateAndKeyProvider()
	{
		return [
			[ new matrix\dimension\side\any(2), new matrix\dimension\side\any(3), new matrix\coordinate\distance\any(0), new matrix\coordinate\distance\any(rand(3, PHP_INT_MAX)) ],
		];
	}
}
