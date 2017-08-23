<?php namespace estvoyage\ticTacToe\tests\units\mixed\comparison\unary\with\numeric;

require __DIR__ . '/../../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class type extends units\test
{
	/**
	 * @dataProvider dataProvider
	 */
	function testConditionForComparisonOfMixedIs($mixed, $nboolean)
	{
		$this
			->given(
				$this->newTestedInstance,
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionForComparisonWithMixedIs($mixed, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments($nboolean)
							->once
		;
	}

	protected function dataProvider()
	{
		return [
			[ rand(PHP_INT_MIN, PHP_INT_MAX), true ],
			[ (string) rand(PHP_INT_MIN, PHP_INT_MAX), true ],
			[ M_PI, true ],
			[ (string) M_PI, true ],
			[ [], false ],
			[ null, false ],
			[ true, false ],
			[ false, false ],
			[ new \stdClass, false ]
		];
	}
}
