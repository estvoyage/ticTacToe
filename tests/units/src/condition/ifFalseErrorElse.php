<?php namespace estvoyage\ticTacToe\tests\units\condition;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifFalseErrorElse extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\condition')
		;
	}

	function testNbooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($error = new \mock\error, $elseBlock = new mockOfTicTacToe\block)
			)
			->if(
				$this->testedInstance->nbooleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($error, $elseBlock))
				->mock($elseBlock)
					->receive('blockArgumentsAre')
						->withArguments()
							->once

			->exception(function() {
					$this->testedInstance->nbooleanIs(false);
				}
			)
				->isIdenticalTo($error)
		;
	}
}
