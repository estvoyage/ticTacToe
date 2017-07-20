<?php namespace estvoyage\ticTacToe\tests\units\iterator\payload;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\iterator\payload')
		;
	}

	function testCurrentValueOfIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$iterator = new mockOfTicTacToe\iterator,
				$value = uniqid()
			)
			->if(
				$this->testedInstance->currentValueOfIteratorIs($iterator, $value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($iterator, $value)
							->once
		;
	}
}
