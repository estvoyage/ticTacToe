<?php namespace estvoyage\ticTacToe\tests\units\block;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class at extends units\test
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
				$block = new mockOfTicTacToe\block,
				$this->calling($block)->blockArgumentsAre = function() { trigger_error(E_USER_ERROR); },
				$arguments = range(0, 9)
			)
			->if(
				$this->newTestedInstance($block)->blockArgumentsAre(... $arguments)
			)
			->then
				->error
					->notExists
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
		;
	}
}
