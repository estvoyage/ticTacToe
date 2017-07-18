<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\comparison\unary;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, matrix };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class lessThanOrEqualTo extends units\test
{
	function testConditionOfComparisonWithMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($coordinate = new mockOfTicTacToe\matrix\coordinate),
				$condition = new mockOfTicTacToe\condition,
				$otherCoordinate = new mockOfTicTacToe\matrix\coordinate
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithMatrixCoordinateIs($otherCoordinate, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($coordinate))
				->mock($condition)
					->receive('nbooleanIs')
						->never

			->given(
				$this->calling($coordinate)->recipientOfPlaceInMatrixRowsIs = function($recipient) {
					$recipient->placeInMatrixIs(new matrix\coordinate\place\any(3));
				},

				$this->calling($coordinate)->recipientOfPlaceInMatrixColumnsIs = function($recipient) {
					$recipient->placeInMatrixIs(new matrix\coordinate\place\any(3));
				},

				$row = rand(1, 3),
				$this->calling($otherCoordinate)->recipientOfPlaceInMatrixRowsIs = function($recipient) use ($row) {
					$recipient->placeInMatrixIs(new matrix\coordinate\place\any($row));
				},

				$column = rand(1, 3),
				$this->calling($otherCoordinate)->recipientOfPlaceInMatrixColumnsIs = function($recipient) use ($column) {
					$recipient->placeInMatrixIs(new matrix\coordinate\place\any($column));
				}
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithMatrixCoordinateIs($otherCoordinate, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($coordinate))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once
		;
	}
}
