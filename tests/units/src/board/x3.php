<?php namespace estvoyage\ticTacToe\tests\units\board;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class x3 extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\board')
		;
	}

	/**
	 * @dataProvider lineColumnAndPositionProvider
	 */
	function testRecipientOfTicTacToeSymbolAtCoordinateIs($rowValue, $columnValue, $position)
	{
		$this
			->given(
				$symbols = [
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol
				],

				$this->newTestedInstance(... $symbols),

				$row = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($row)->recipientOfValueOfOIntegerIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($column)->recipientOfValueOfOIntegerIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) use ($row) {
					$recipient->rowInMatrixIs($row);
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) use ($column) {
					$recipient->columnInMatrixIs($column);
				},

				$recipient = new mockOfTicTacToe\symbol\recipient
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeSymbolAtCoordinateIs($coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(... $symbols))
				->mock($recipient)
					->receive('ticTacToeSymbolIs')
						->withArguments($symbols[$position])
							->once
		;
	}

	/**
	 * @dataProvider lineColumnAndPositionProvider
	 */
	function testRecipientOfTicTacToeBoardWithSymbolAtCoordinateIs($rowValue, $columnValue, $position)
	{
		$this
			->given(
				$this->newTestedInstance(
					$l0c0 = new mockOfTicTacToe\symbol,
					$l0c1 = new mockOfTicTacToe\symbol,
					$l0c2 = new mockOfTicTacToe\symbol,
					$l1c0 = new mockOfTicTacToe\symbol,
					$l1c1 = new mockOfTicTacToe\symbol,
					$l1c2 = new mockOfTicTacToe\symbol,
					$l2c0 = new mockOfTicTacToe\symbol,
					$l2c1 = new mockOfTicTacToe\symbol,
					$l2c2 = new mockOfTicTacToe\symbol
				),

				$row = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($row)->recipientOfValueOfOIntegerIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($column)->recipientOfValueOfOIntegerIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) use ($row) {
					$recipient->rowInMatrixIs($row);
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) use ($column) {
					$recipient->columnInMatrixIs($column);
				},

				$symbol = new mockOfTicTacToe\symbol,

				$symbols = [
					$l0c0,
					$l0c1,
					$l0c2,
					$l1c0,
					$l1c1,
					$l1c2,
					$l2c0,
					$l2c1,
					$l2c2
				],
				$symbols[$position] = $symbol,

				$recipient = new mockOfTicTacToe\board\recipient
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeBoardWithSymbolAtCoordinateIs($symbol, $coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$l0c0,
							$l0c1,
							$l0c2,
							$l1c0,
							$l1c1,
							$l1c2,
							$l2c0,
							$l2c1,
							$l2c2
						)
					)
				->mock($recipient)
					->receive('ticTacToeBoardIs')
						->withArguments($this->newTestedInstance(...$symbols))
							->once
		;
	}

	/**
	 * @dataProvider invalidLineAndColumnProvider
	 */
	function testRecipientOfTicTacToeBoardWithSymbolAtCoordinateIs_withInvalidCoordinate($rowValue, $columnValue)
	{
		$this
			->given(
				$symbols = [
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol,
					new mockOfTicTacToe\symbol
				],

				$this->newTestedInstance(... $symbols),

				$row = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($row)->recipientOfValueOfOIntegerIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($column)->recipientOfValueOfOIntegerIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) use ($row) {
					$recipient->rowInMatrixIs($row);
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) use ($column) {
					$recipient->columnInMatrixIs($column);
				},

				$symbol = new mockOfTicTacToe\symbol,

				$recipient = new mockOfTicTacToe\board\recipient
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeBoardWithSymbolAtCoordinateIs($symbol, $coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(... $symbols))
				->mock($recipient)
					->receive('ticTacToeBoardIs')
						->never
		;
	}

	/**
	 * @dataProvider lineColumnAndPositionProvider
	 */
	function testRecipientOfTicTacToeBoardWithSymbolAtCoordinateIs_withSymbolOverlap($rowValue, $columnValue, $position)
	{
		$this
			->given(
				$this->newTestedInstance(
					$l0c0 = new mockOfTicTacToe\symbol,
					$l0c1 = new mockOfTicTacToe\symbol,
					$l0c2 = new mockOfTicTacToe\symbol,
					$l1c0 = new mockOfTicTacToe\symbol,
					$l1c1 = new mockOfTicTacToe\symbol,
					$l1c2 = new mockOfTicTacToe\symbol,
					$l2c0 = new mockOfTicTacToe\symbol,
					$l2c1 = new mockOfTicTacToe\symbol,
					$l2c2 = new mockOfTicTacToe\symbol
				),

				$symbol = new mockOfTicTacToe\symbol,
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsX();
				},

				$symbols = [
					$l0c0,
					$l0c1,
					$l0c2,
					$l1c0,
					$l1c1,
					$l1c2,
					$l2c0,
					$l2c1,
					$l2c2
				],

				$this->calling($symbols[$position])->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsX();
				},

				$row = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($row)->recipientOfValueOfOIntegerIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\matrix\coordinate\distance,
				$this->calling($column)->recipientOfValueOfOIntegerIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfRowInMatrixIs = function($recipient) use ($row) {
					$recipient->rowInMatrixIs($row);
				},
				$this->calling($coordinate)->recipientOfColumnInMatrixIs = function($recipient) use ($column) {
					$recipient->columnInMatrixIs($column);
				},

				$recipient = new mockOfTicTacToe\board\recipient
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeBoardWithSymbolAtCoordinateIs($symbol, $coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$l0c0,
							$l0c1,
							$l0c2,
							$l1c0,
							$l1c1,
							$l1c2,
							$l2c0,
							$l2c1,
							$l2c2
						)
					)
				->mock($recipient)
					->receive('ticTacToeBoardIs')
						->never
		;
	}

	protected function lineColumnAndPositionProvider()
	{
		return [
			'l0c0' => [ 0, 0, 0 ], 'l0c1' => [ 0, 1, 1 ], 'l0c2' => [ 0, 2, 2 ],
			'l1c0' => [ 1, 0, 3 ], 'l1c1' => [ 1, 1, 4 ], 'l1c2' => [ 1, 2, 5 ],
			'l2c0' => [ 2, 0, 6 ], 'l2c1' => [ 2, 1, 7 ], 'l2c2' => [ 2, 2, 8 ]
		];
	}

	protected function invalidLineAndColumnProvider()
	{
		return [
			[ - rand(1, 2), - rand(1, 2) ],
			[ rand(3, PHP_INT_MAX), rand(3, PHP_INT_MAX) ],
			[ rand(PHP_INT_MIN, -1), rand(PHP_INT_MIN, -1) ],
			[ PHP_INT_MIN, PHP_INT_MIN ],
			[ PHP_INT_MAX, PHP_INT_MAX ]
		];
	}
}
