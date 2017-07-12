<?php namespace estvoyage\ticTacToe\tests\units;

require __DIR__ . '/../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class future extends units\test
{
	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($blockForValue = new mockOfTicTacToe\block, $blockIfNoBinding = new mockOfTicTacToe\block),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($blockForValue, $blockIfNoBinding))
				->mock($blockForValue)
					->receive('blockArgumentsAre')
						->never
				->mock($blockIfNoBinding)
					->receive('blockArgumentsAre')
						->once

			->given(
				$value = uniqid(),

				$this->calling($block)->blockArgumentsAre = function($future) use ($value) {
					$future->valueIs($value);
				}
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($blockForValue, $blockIfNoBinding))
				->mock($blockForValue)
					->receive('blockArgumentsAre')
						->withArguments($value)
							->once
				->mock($blockIfNoBinding)
					->receive('blockArgumentsAre')
						->once
		;
	}
}
