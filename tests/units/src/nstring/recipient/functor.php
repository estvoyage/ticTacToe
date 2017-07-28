<?php namespace estvoyage\ticTacToe\tests\units\nstring\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\nstring\recipient')
		;
	}

	function testNstringIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$nstring = uniqid()
			)
			->if(
				$this->testedInstance->nstringIs($nstring)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $nstring ])
		;
	}
}
