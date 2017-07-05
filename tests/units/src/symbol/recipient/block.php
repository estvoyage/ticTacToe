<?php namespace estvoyage\ticTacToe\tests\units\symbol\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\recipient')
		;
	}

	function testTicTacToeSymbolIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$symbol = new mockOfTicTacToe\symbol
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIs($symbol)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($symbol)
							->once
		;
	}
}
