<?php namespace estvoyage\ticTacToe\tests\units\block;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class forwarder extends units\test
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
				$this->newTestedInstance($block = new mockOfTicTacToe\block, ... ($arguments = [ '', uniqid(), null, true, false, rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, [], new \stdClass ])),
				$otherArguments = [ '', uniqid(), null, true, false, rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, [], new \stdClass ]
			)
			->if(
				$this->testedInstance->blockArgumentsAre(... $otherArguments)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, ... $arguments))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(... array_merge($arguments, $otherArguments))
							->once
		;
	}
}
