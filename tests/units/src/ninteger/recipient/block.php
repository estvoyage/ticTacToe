<?php namespace estvoyage\ticTacToe\tests\units\ninteger\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\recipient')
		;
	}

	function testNIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->nintegerIs($ninteger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($ninteger)
							->once
		;
	}
}
