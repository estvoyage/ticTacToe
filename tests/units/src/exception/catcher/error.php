<?php namespace estvoyage\ticTacToe\tests\units\exception\catcher;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class error extends units\test
{
	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($error = new \mock\error),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($error))

			->if(
				$this->calling($block)->blockArgumentsAre = function() {
					throw new \mock\error;
				}
			)
			->then
				->exception(function() use ($block) { $this->testedInstance->blockIs($block); })
					->isEqualTo($error)
		;
	}
}
