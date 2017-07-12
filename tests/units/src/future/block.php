<?php namespace estvoyage\ticTacToe\tests\units\future;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\future')
		;
	}

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

	function testValueIs()
	{
		$this
			->given(
				$this->newTestedInstance($blockForValue = new mockOfTicTacToe\block, $blockIfNoBinding = new mockOfTicTacToe\block),
				$value = uniqid()
			)
			->if(
				$this->testedInstance->valueIs($value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($blockForValue, $blockIfNoBinding))
		;
	}
}
