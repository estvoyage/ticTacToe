<?php namespace estvoyage\ticTacToe\tests\units\ninteger\generator;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class increment extends units\test
{
	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($start = 0, $end = 9, $step = 3),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->ticTacToeBlockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($start, $end, $step))
				->mock($block)
					->receive('blockArgumentsAre')
						->{4}
						->withArguments(0)
							->once
						->withArguments(3)
							->once
						->withArguments(6)
							->once
						->withArguments(9)
							->once
		;
	}
}
