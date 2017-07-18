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
				$this->calling($coordinate)->recipientOfDistanceInMatrixRowIs = function($recipient) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any(3));
				},

				$this->calling($coordinate)->recipientOfDistanceInMatrixcolumnIs = function($recipient) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any(3));
				},

				$row = rand(1, 3),
				$this->calling($otherCoordinate)->recipientOfDistanceInMatrixRowIs = function($recipient) use ($row) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($row));
				},

				$column = rand(1, 3),
				$this->calling($otherCoordinate)->recipientOfDistanceInMatrixcolumnIs = function($recipient) use ($column) {
					$recipient->distanceInMatrixIs(new matrix\coordinate\distance\any($column));
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
