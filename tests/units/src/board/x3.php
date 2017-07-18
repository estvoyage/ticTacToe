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

				$row = new mockOfTicTacToe\coordinate\place,
				$this->calling($row)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\coordinate\place,
				$this->calling($column)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($row) {
					$recipient->placeInTicTacToeBoardIs($row);
				},
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($column) {
					$recipient->placeInTicTacToeBoardIs($column);
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
					$l1c1 = new mockOfTicTacToe\symbol,
					$l1c2 = new mockOfTicTacToe\symbol,
					$l1c3 = new mockOfTicTacToe\symbol,
					$l2c1 = new mockOfTicTacToe\symbol,
					$l2c2 = new mockOfTicTacToe\symbol,
					$l2c3 = new mockOfTicTacToe\symbol,
					$l3c1 = new mockOfTicTacToe\symbol,
					$l3c2 = new mockOfTicTacToe\symbol,
					$l3c3 = new mockOfTicTacToe\symbol
				),

				$row = new mockOfTicTacToe\coordinate\place,
				$this->calling($row)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\coordinate\place,
				$this->calling($column)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($row) {
					$recipient->placeInTicTacToeBoardIs($row);
				},
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($column) {
					$recipient->placeInTicTacToeBoardIs($column);
				},

				$symbol = new mockOfTicTacToe\symbol,

				$symbols = [
					$l1c1,
					$l1c2,
					$l1c3,
					$l2c1,
					$l2c2,
					$l2c3,
					$l3c1,
					$l3c2,
					$l3c3
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
							$l1c1,
							$l1c2,
							$l1c3,
							$l2c1,
							$l2c2,
							$l2c3,
							$l3c1,
							$l3c2,
							$l3c3
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

				$row = new mockOfTicTacToe\coordinate\place,
				$this->calling($row)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\coordinate\place,
				$this->calling($column)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($row) {
					$recipient->placeInTicTacToeBoardIs($row);
				},
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($column) {
					$recipient->placeInTicTacToeBoardIs($column);
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
					$l1c1 = new mockOfTicTacToe\symbol,
					$l1c2 = new mockOfTicTacToe\symbol,
					$l1c3 = new mockOfTicTacToe\symbol,
					$l2c1 = new mockOfTicTacToe\symbol,
					$l2c2 = new mockOfTicTacToe\symbol,
					$l2c3 = new mockOfTicTacToe\symbol,
					$l3c1 = new mockOfTicTacToe\symbol,
					$l3c2 = new mockOfTicTacToe\symbol,
					$l3c3 = new mockOfTicTacToe\symbol
				),

				$symbol = new mockOfTicTacToe\symbol,
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsX();
				},

				$symbols = [
					$l1c1,
					$l1c2,
					$l1c3,
					$l2c1,
					$l2c2,
					$l2c3,
					$l3c1,
					$l3c2,
					$l3c3
				],

				$this->calling($symbols[$position])->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsX();
				},

				$row = new mockOfTicTacToe\coordinate\place,
				$this->calling($row)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($rowValue) {
					$recipient->nintegerIs($rowValue);
				},

				$column = new mockOfTicTacToe\coordinate\place,
				$this->calling($column)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($columnValue) {
					$recipient->nintegerIs($columnValue);
				},

				$coordinate = new mockOfTicTacToe\coordinate,
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardRowsIs = function($recipient) use ($row) {
					$recipient->placeInTicTacToeBoardIs($row);
				},
				$this->calling($coordinate)->recipientOfPlaceInTicTacToeBoardColumnsIs = function($recipient) use ($column) {
					$recipient->placeInTicTacToeBoardIs($column);
				},

				$recipient = new mockOfTicTacToe\board\recipient
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeBoardWithSymbolAtCoordinateIs($symbol, $coordinate, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(
							$l1c1,
							$l1c2,
							$l1c3,
							$l2c1,
							$l2c2,
							$l2c3,
							$l3c1,
							$l3c2,
							$l3c3
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
			'l1c1' => [ 1, 1, 0 ], 'l1c2' => [ 1, 2, 1 ], 'l1c3' => [ 1, 3, 2 ],
			'l2c1' => [ 2, 1, 3 ], 'l2c2' => [ 2, 2, 4 ], 'l2c3' => [ 2, 3, 5 ],
			'l3c1' => [ 3, 1, 6 ], 'l3c2' => [ 3, 2, 7 ], 'l3c3' => [ 3, 3, 8 ]
		];
	}

	protected function invalidLineAndColumnProvider()
	{
		return [
			[ rand(4, PHP_INT_MAX), rand(4, PHP_INT_MAX) ]
		];
	}
}
