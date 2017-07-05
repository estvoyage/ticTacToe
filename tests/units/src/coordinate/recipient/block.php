<?php namespace estvoyage\ticTacToe\tests\units\coordinate\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\recipient')
		;
	}

	function testLineAndColumnOfTicTacToeSymbolIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$line = rand(PHP_INT_MIN, PHP_INT_MAX),
				$column = rand(PHP_INT_MIN, PHP_INT_MAX)
			)
			->if(
				$this->testedInstance->lineAndColumnOfTicTacToeSymbolIs($line, $column)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($line, $column)
							->once
		;
	}
}
