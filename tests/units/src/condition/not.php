<?php namespace estvoyage\ticTacToe\tests\units\condition;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class not extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\condition')
		;
	}

	function testNBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($condition = new mockOfTicTacToe\condition)
			)

			->if(
				$this->testedInstance->nbooleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($condition))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once

			->if(
				$this->testedInstance->nbooleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($condition))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(false)
							->once
		;
	}
}
