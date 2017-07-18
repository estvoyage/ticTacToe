<?php namespace estvoyage\ticTacToe\tests\units\coordinate\place\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\place\recipient')
		;
	}

	function testPlaceInTicTacToeBoardIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$place = new mockOfTicTacToe\coordinate\place
			)
			->if(
				$this->testedInstance->placeInTicTacToeBoardIs($place)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $place ])
		;
	}
}
