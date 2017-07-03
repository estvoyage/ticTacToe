<?php namespace estvoyage\ticTacToe\tests\units\symbol\container\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\container\recipient')
		;
	}

	function testTicTacToeSymbolContainerIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$container = new mockOfTicTacToe\symbol\container
			)
			->if(
				$this->testedInstance->ticTacToeSymbolContainerIs($container)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $container ])
		;
	}
}
