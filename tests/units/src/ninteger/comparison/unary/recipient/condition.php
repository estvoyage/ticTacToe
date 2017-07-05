<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary\recipient;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class condition extends units\test
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
				$this->newTestedInstance($condition = new mockOfTicTacToe\nboolean\recipient),
				$ninteger = rand(PHP_INT_MIN, PHP_INT_MAX),
				$boolean = rand(0, 1) == 1,

				$conditionWithArguments = new mockOfTicTacToe\nboolean\recipient,
				$this->calling($condition)->recipientOfNBooleanRecipientWithArgumentsIs = function($arguments, $recipient) use ($ninteger, $conditionWithArguments) {
					if ($arguments == [ $ninteger ])
					{
						$recipient->nbooleanRecipientIs($conditionWithArguments);
					}
				}
			)
			->if(
				$this->testedInstance->comparisonWithNIntegerIs($ninteger, $boolean)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($condition))
				->mock($conditionWithArguments)
					->receive('nbooleanIs')
						->withArguments($boolean)
							->once
		;
	}
}
