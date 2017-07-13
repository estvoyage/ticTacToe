<?php namespace estvoyage\ticTacToe\tests\units\matrix\value\recipient\future;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\value\recipient')
		;
	}

	function testFutureForBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($noBinding = new mockOfTicTacToe\block),
				$block = new mockOfTicTacToe\block,
				$future = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->futureForblockIs($block, $future)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($noBinding))
				->mock($future)
					->receive('blockArgumentsAre')
						->never
				->mock($noBinding)
					->receive('blockArgumentsAre')
						->once

			->given(
				$value = uniqid(),
				$this->calling($block)->blockArgumentsAre = function($future) use ($value) {
					$future->matrixValueIs($value);
				}
			)
			->if(
				$this->testedInstance->futureForblockIs($block, $future)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($noBinding))
				->mock($future)
					->receive('blockArgumentsAre')
						->withArguments($value)
							->once
				->mock($noBinding)
					->receive('blockArgumentsAre')
						->once
		;
	}
}
