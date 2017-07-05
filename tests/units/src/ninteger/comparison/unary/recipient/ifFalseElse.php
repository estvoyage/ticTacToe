<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifFalseElse extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\comparison\unary\recipient')
		;
	}

	function testComparisonWithNIntegerIs()
	{
		$this
			->given(
				$trueArguments = null,
				$falseArguments = null,
				$this->newTestedInstance(
					$false = new mockOfTicTacToe\block,
					$true = new mockOfTicTacToe\block
				),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$boolean = true
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, $boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($false, $true))
				->mock($true)
					->receive('blockArgumentsAre')
						->withArguments($ninteger)
							->once
				->mock($false)
					->receive('blockArgumentsAre')
						->never

			->given(
				$boolean = false
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, $boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($false, $true))
				->mock($true)
					->receive('blockArgumentsAre')
						->withArguments($ninteger)
							->once
				->mock($false)
					->receive('blockArgumentsAre')
						->withArguments($ninteger)
							->once
		;
	}
}
