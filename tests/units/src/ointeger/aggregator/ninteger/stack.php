<?php namespace estvoyage\ticTacToe\tests\units\ointeger\aggregator\ninteger;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class stack extends units\test
{
	function testOIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance,

				$ointeger = new mockOfTicTacToe\ointeger,

				$value1 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($ointeger)->recipientOfValueOfOIntegerIs = function($recipient) use ($value1) {
					$recipient->nintegerIs($value1);
				}
			)
			->if(
				$this->testedInstance->ointegerIs($ointeger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value1))

			->given(
				$value2 = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($ointeger)->recipientOfValueOfOIntegerIs = function($recipient) use ($value2) {
					$recipient->nintegerIs($value2);
				}
			)
			->if(
				$this->testedInstance->ointegerIs($ointeger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value1, $value2))
		;
	}

	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($value1 = rand(PHP_INT_MIN, PHP_INT_MAX), $value2 = rand(PHP_INT_MIN, PHP_INT_MAX)),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value1, $value2))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($value1, $value2)
							->once
		;
	}
}
