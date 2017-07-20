<?php namespace estvoyage\ticTacToe\tests\units\matrix\value\container;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class fifo extends units\test
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
				$this->newTestedInstance,
				$iterator = new mockOfTicTacToe\iterator,
				$payload = new mockOfTicTacToe\iterator\payload
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

			->given(
				$this->newTestedInstance(
					$value1 = new mockOfTicTacToe\matrix\value,
					$value2 = new mockOfTicTacToe\matrix\value,
					$value3 = new mockOfTicTacToe\matrix\value
				)
			)
			->if(
				$this->testedInstance->payloadForIteratorIs($iterator, $payload)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value1, $value2, $value3))
				->mock($iterator)
					->receive('valuesForIteratorPayloadAre')
						->withArguments($payload, [ $value1, $value2, $value3 ])
							->once
		;
	}
}
