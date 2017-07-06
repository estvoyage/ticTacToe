<?php namespace estvoyage\ticTacToe\tests\units\condition;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifTrue extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\condition')
		;
	}

	function test__construct()
	{
		$this
			->given(
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->newTestedInstance(
					$block
				)
			)
			->then
				->object($this->testedInstance)->isEqualTo($this->newTestedInstance($block, []))
		;
	}

	function testNBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block, $arguments = [ '', uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, null, true, false, new \stdClass, [] ])
			)
			->if(
				$this->testedInstance->nbooleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $arguments))
				->mock($block)
					->receive('blockArgumentsAre')
						->never
			->if(
				$this->testedInstance->nbooleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $arguments))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
		;
	}
}
