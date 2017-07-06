<?php namespace estvoyage\ticTacToe\tests\units\condition\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\condition\recipient')
		;
	}

	function testConditionIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionIs($condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($condition)
							->once
		;
	}
}
