<?php namespace estvoyage\ticTacToe\tests\units\matrix\value\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class future extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\value\recipient')
		;
	}

	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($blockForValue = new mockOfTicTacToe\block, $blockIfNoValue = new mockOfTicTacToe\block),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($blockForValue, $blockIfNoValue))
				->mock($blockForValue)
					->receive('blockArgumentsAre')
						->never
				->mock($blockIfNoValue)
					->receive('blockArgumentsAre')
						->once

			->given(
				$value = uniqid(),
				$this->calling($block)->blockArgumentsAre = function($future) use ($value) {
					$future->matrixValueIs($value);
				}
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($blockForValue, $blockIfNoValue))
				->mock($blockForValue)
					->receive('blockArgumentsAre')
						->once
				->mock($blockIfNoValue)
					->receive('blockArgumentsAre')
						->once
		;
	}
}
