<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\place\comparison\unary;

require __DIR__ . '/../../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class lessThanOrEqualTo extends units\test
{
	function testConditionOfComparisonWithDistanceOfMatrixCoordinateIs()
	{
		$this
			->given(
				$this->newTestedInstance($place = new mockOfTicTacToe\matrix\coordinate\place),
				$condition = new mockOfTicTacToe\condition,
				$otherPlace = new mockOfTicTacToe\matrix\coordinate\place
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithPlaceOfMatrixCoordinateIs($otherPlace, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($place))
				->mock($condition)
					->receive('nbooleanIs')
						->never

			->given(
				$this->calling($place)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(3);
				},

				$this->calling($otherPlace)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(rand(1, 3));
				}
			)
			->if(
				$this->testedInstance->conditionOfComparisonWithPlaceOfMatrixCoordinateIs($otherPlace, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($place))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once
		;
	}
}
