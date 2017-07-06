<?php namespace estvoyage\ticTacToe\tests\units\condition;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifTrueError extends units\test
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
			->exception(
				function() use (& $error) {
					$this->newTestedInstance($error = new \mock\error)->nbooleanIs(true);
				}
			)
				->isIdenticalTo($error)
		;
	}
}
