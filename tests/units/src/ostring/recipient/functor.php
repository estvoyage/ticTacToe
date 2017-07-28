<?php namespace estvoyage\ticTacToe\tests\units\ostring\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ostring\recipient')
		;
	}

	function testOStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$ostring = new mockOfTicTacToe\ostring
			)
			->if(
				$this->testedInstance->ostringIs($ostring)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $ostring ])
		;
	}
}
