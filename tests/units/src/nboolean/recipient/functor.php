<?php namespace estvoyage\ticTacToe\tests\units\nboolean\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class functor extends units\test
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
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$boolean = rand(0, 1) == 1
			)
			->if(
				$this->testedInstance->nbooleanIs($boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $boolean ])
		;
	}
}
