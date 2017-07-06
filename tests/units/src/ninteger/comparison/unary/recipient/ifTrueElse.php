<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifTrueElse extends units\test
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
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->newTestedInstance(
					$true = new mockOfTicTacToe\block,
					$false = new mockOfTicTacToe\block
				)
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($true, $false))
				->mock($true)
					->receive('blockArgumentsAre')
						->withArguments()
							->once
				->mock($false)
					->receive('blockArgumentsAre')
						->never

			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($true, $false))
				->mock($true)
					->receive('blockArgumentsAre')
						->withArguments()
							->once
				->mock($false)
					->receive('blockArgumentsAre')
						->withArguments()
							->once
		;
	}
}
