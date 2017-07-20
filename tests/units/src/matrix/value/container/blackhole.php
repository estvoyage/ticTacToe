<?php namespace estvoyage\ticTacToe\tests\units\matrix\value\container;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\value\container')
		;
	}

	function testPayloadForIteratorIs()
	{
		$this
			->given(
				$iterator = new mockOfTicTacToe\iterator,
				$payload = new mockOfTicTacToe\iterator\payload,
				$this->newTestedInstance
			)
			->if(
				$this->testedInstance->payloadForIteratorIs($iterator, $payload)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($iterator)
					->receive('valuesForIteratorPayloadAre')
						->never
		;
	}
}
