<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\distance\comparison\unary;

require __DIR__ . '/../../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class lessThanOrEqualTo extends units\test
{
	function testConditionOfComparisonWithDistanceOfMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($distance = new mockOfTicTacToe\matrix\coordinate\distance),
				$condition = new mockOfTicTacToe\condition,
				$otherDistance = new mockOfTicTacToe\matrix\coordinate\distance
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithDistanceOfMatrixCoordinateIs($otherDistance, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($distance))
				->mock($condition)
					->receive('nbooleanIs')
						->never

			->given(
				$this->calling($distance)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(3);
				},

				$this->calling($otherDistance)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(rand(1, 3));
				}
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithDistanceOfMatrixCoordinateIs($otherDistance, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($distance))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once
		;
	}
}
