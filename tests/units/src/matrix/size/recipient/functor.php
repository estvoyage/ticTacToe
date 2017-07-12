<?php namespace estvoyage\ticTacToe\tests\units\matrix\size\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\size\recipient')
		;
	}

	function testMatrixSizeIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$size = new mockOfTicTacToe\matrix\size
			)
			->if(
				$this->testedInstance->matrixSizeIs($size)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $size ])
		;
	}
}
