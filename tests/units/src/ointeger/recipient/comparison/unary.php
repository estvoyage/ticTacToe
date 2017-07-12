<?php namespace estvoyage\ticTacToe\tests\units\ointeger\recipient\comparison;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class unary extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\recipient')
		;
	}

	function testOIntegerIs()
	{
		$this
			->given(
				$this->newTestedInstance($comparison = new mockOfTicTacToe\ointeger\comparison\unary, $condition = new mockOfTicTacToe\condition),
				$ointeger = new mockOfTicTacToe\ointeger
			)
			->if(
				$this->testedInstance->ointegerIs($ointeger)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($comparison, $condition))
				->mock($comparison)
					->receive('recipientOfComparisonWithOIntegerIsCondition')
						->withArguments($ointeger, $condition)
							->once
		;
	}
}
