<?php namespace estvoyage\ticTacToe\tests\units\coordinate\place;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\coordinate\place')
		;
	}

	/**
	 * @dataProvider invalidValueProvider
	 */
	function testWithInvalidValue($value)
	{
		$this
			->exception(function() use ($value) { $this->newTestedInstance($value); })
				->isInstanceOf('typeError')
				->hasMessage('Value should be an integer greater than 0')
		;
	}

	/**
	 * @dataProvider validValueProvider
	 */
	function testRecipientOfNIntegerGreaterThanZeroIs_withValidValue($value)
	{
		$this
			->given(
				$this->newTestedInstance($value),
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->testedInstance->recipientOfNIntegerGreaterThanZeroIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value))
				->mock($recipient)
					->receive('nintegerIs')
						->withArguments((int) (string) $value)
							->once
		;
	}

	protected function validValueProvider()
	{
		return [
			1,
			'1',
			PHP_INT_MAX,
			(string) PHP_INT_MAX,
			rand(1, PHP_INT_MAX - 1),
			(string) rand(1, PHP_INT_MAX - 1)
		];
	}

	protected function invalidValueProvider()
	{
		return [
			0,
			'0',
			M_PI,
			(string) M_PI,
			'',
			false,
			true,
			null,
			new \stdClass,
			-1,
			'-1',
			PHP_INT_MIN,
			(string) PHP_INT_MIN,
			rand(PHP_INT_MIN + 1, - 1),
			(string) rand(PHP_INT_MIN + 1, - 1)
		];
	}
}
