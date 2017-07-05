<?php namespace estvoyage\ticTacToe\tests\units\symbol\container\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\container\recipient')
		;
	}

	function testTicTacToeSymbolContainerIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$container = new mockOfTicTacToe\symbol\container
			)
			->if(
				$this->testedInstance->ticTacToeSymbolContainerIs($container)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($container)
							->once
		;
	}
}
