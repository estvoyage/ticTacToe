<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\place\comparison\unary\ointeger;

require __DIR__ . '/../../../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testConditionForComparisonWithPlaceInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($ointeger = new mockOfTicTacToe\ointeger, $comparison = new mockOfTicTacToe\ninteger\comparison\binary),
				$place = new mockOfTicTacToe\matrix\coordinate\place,
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionForComparisonWithPlaceInMatrixIs($place, $condition)
			)
			->then
				->mock($comparison)
					->receive('conditionOfComparisonBetweenNIntegerAndNIntegerIs')
						->never

			->given(
				$valueOfPlace = rand(1, PHP_INT_MAX),
				$this->calling($place)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($valueOfPlace) {
					$recipient->nintegerIs($valueOfPlace);
				},

				$valueOfOInteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($ointeger)->recipientOfValueOfOIntegerIs = function($recipient) use ($valueOfOInteger) {
					$recipient->nintegerIs($valueOfOInteger);
				}
			)
			->if(
				$this->testedInstance->conditionForComparisonWithPlaceInMatrixIs($place, $condition)
			)
			->then
				->mock($comparison)
					->receive('conditionOfComparisonBetweenNIntegerAndNIntegerIs')
						->withArguments($valueOfOInteger, $valueOfPlace, $condition)
							->once
		;
	}
}
