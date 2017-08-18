<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\place\comparison\unary\lessThan;

require __DIR__ . '/../../../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ointeger extends units\test
{
	function testConditionForComparisonWithPlaceInMatrix()
	{
		$this
			->given(
				$this->newTestedInstance($ointeger = new mockOfTicTacToe\ointeger),
				$place = new mockOfTicTacToe\matrix\coordinate\place,
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionForComparisonWithPlaceInMatrixIs($place, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger))
				->mock($condition)
					->receive('nbooleanIs')
						->never

			->given(
				$ointegerValue = rand(PHP_INT_MIN, PHP_INT_MAX),

				$this->calling($ointeger)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointegerValue) {
					$recipient->nintegerIs($ointegerValue);
				},

				$this->calling($place)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($ointegerValue) {
					$recipient->nintegerIs($ointegerValue);
				}
			)
			->if(
				$this->testedInstance->conditionForComparisonWithPlaceInMatrixIs($place, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(false)
							->once

			->given(
				$this->calling($ointeger)->recipientOfValueOfOIntegerIs = function($recipient) {
					$recipient->nintegerIs(rand(PHP_INT_MIN, PHP_INT_MAX - 1));
				},

				$this->calling($place)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(PHP_INT_MAX);
				}
			)
			->if(
				$this->testedInstance->conditionForComparisonWithPlaceInMatrixIs($place, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once

			->given(
				$this->calling($ointeger)->recipientOfValueOfOIntegerIs = function($recipient) {
					$recipient->nintegerIs(PHP_INT_MAX);
				},

				$this->calling($place)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) {
					$recipient->nintegerIs(1);
				}
			)
			->if(
				$this->testedInstance->conditionForComparisonWithPlaceInMatrixIs($place, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ointeger))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(false)
							->twice

		;
	}
}
