<?php namespace estvoyage\ticTacToe\tests\units\block;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class proxy extends units\test
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
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$arguments = [ '', uniqid(), 0, rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, null, true, false, [], new \stdClass ]
			)
			->if(
				$this->testedInstance->blockArgumentsAre(... $arguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
		;
	}
}
