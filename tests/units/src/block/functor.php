<?php namespace estvoyage\ticTacToe\tests\units\block;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\block')
		;
	}

	function testBlockArgumentsAre()
	{
		$this
			->given(
				$arguments = [ uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, null, true, false, new \stdClass ],
				$this->newTestedInstance($callable = function() use (& $callableArguments) { $callableArguments = func_get_args(); })
			)
			->if(
				$this->testedInstance->blockArgumentsAre(... $arguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo($callableArguments)
		;
	}
}
