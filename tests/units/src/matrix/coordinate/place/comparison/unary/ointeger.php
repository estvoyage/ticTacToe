<?php namespace estvoyage\ticTacToe\tests\units\matrix\coordinate\place\comparison\unary;

require __DIR__ . '/../../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

abstract class ointeger extends units\test
{
	/**
	 * @dataProvider dataProvider
	 */
	function testConditionForComparisonWithPlaceInMatrix($ointegerValue, $placeValue, $nboolean)
	{
		$this
			->given(
				$ointeger = new mockOfTicTacToe\ointeger,
				$this->calling($ointeger)->recipientOfValueOfOIntegerIs = function($recipient) use ($ointegerValue) {
					$recipient->nintegerIs($ointegerValue);
				},

				$place = new mockOfTicTacToe\matrix\coordinate\place,
				$this->calling($place)->recipientOfNIntegerGreaterThanZeroIs = function($recipient) use ($placeValue) {
					$recipient->nintegerIs($placeValue);
				},

				$this->newTestedInstance($ointeger),

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
						->withArguments($nboolean)
							->once
		;
	}

	abstract protected function dataProvider();
}
