<?php namespace estvoyage\ticTacToe\tests\units\ninteger\comparison\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class lessThan extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ninteger\comparison\unary')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(0));
	}

	/**
	 * @dataProvider argumentsProvider
	 */
	function testRecipientOfComparisonWithNIntegerIs($ninteger1, $ninteger2, $boolean)
	{
		$this
			->given(
				$this->newTestedInstance($ninteger1),
				$recipient = new mockOfTicTacToe\ninteger\comparison\unary\recipient
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithNIntegerIs($ninteger2, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ninteger1))
				->mock($recipient)
					->receive('comparisonWithNIntegerIs')
						->withArguments($ninteger2, $boolean)
							->once
		;
	}

	protected function argumentsProvider()
	{
		return [
			[ rand(PHP_INT_MIN, PHP_INT_MAX - 1), PHP_INT_MAX, false ],
			[ PHP_INT_MAX, rand(PHP_INT_MIN, PHP_INT_MAX - 1), true ],
			[ 0, 0, false ],
			[ PHP_INT_MIN, PHP_INT_MIN, false ],
			[ PHP_INT_MAX, PHP_INT_MAX, false ]
		];
	}
}
