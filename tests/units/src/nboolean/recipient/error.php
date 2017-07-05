<?php namespace estvoyage\ticTacToe\tests\units\nboolean\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class error extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\nboolean\recipient')
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
