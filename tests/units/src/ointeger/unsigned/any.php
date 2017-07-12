<?php namespace estvoyage\ticTacToe\tests\units\ointeger\unsigned;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ointeger\unsigned')
		;
	}

	function test__construct()
	{
		$this->object($this->newTestedInstance)->isEqualTo($this->newTestedInstance(0));
	}

	/**
	 * @dataProvider validValueProvider
	 */
	function testWithValidValue($value)
	{
		$this
			->given(
				$recipient = new mockOfTicTacToe\ninteger\recipient
			)
			->if(
				$this->newTestedInstance($value)
					->recipientOfValueOfOIntegerIs($recipient)
			)
			->then
				->mock($recipient)
					->receive('nintegerIs')
						->withArguments((int) (string) $value)
							->once
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
				->hasMessage('Value should be an unsigned integer')
		;
	}

	/**
	 * @dataProvider validValueProvider
	 */
	function testRecipientOfOIntegerWithValueIs_withValidValue($value)
	{
		$this
			->given(
				$this->newTestedInstance(0),
				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOIntegerWithValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(0))
				->mock($recipient)
					->receive('ointegerIs')
						->withArguments($this->newTestedInstance($value))
							->once
		;
	}

	/**
	 * @dataProvider invalidValueProvider
	 */
	function testRecipientOfOIntegerWithValueIs_withInvalidValue($value)
	{
		$this
			->given(
				$this->newTestedInstance(0),
				$recipient = new mockOfTicTacToe\ointeger\recipient
			)
			->if(
				$this->testedInstance->recipientOfOIntegerWithValueIs($value, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance(0))
				->mock($recipient)
					->receive('ointegerIs')
						->never
		;
	}

	/**
	 * @dataProvider validValueProvider
	 */
	function testRecipientOfValueOfUnsignedOIntegerIs($value)
	{
		$this
			->given(
				$recipient = new mockOfTicTacToe\ninteger\unsigned\recipient
			)
			->if(
				$this->newTestedInstance($value)
					->recipientOfValueOfUnsignedOIntegerIs($recipient)
			)
			->then
				->mock($recipient)
					->receive('unsignedNintegerIs')
						->withArguments((int) (string) $value)
							->once
		;
	}

	protected function validValueProvider()
	{
		return [
			0,
			PHP_INT_MAX,
			'0',
			(string) PHP_INT_MAX,
			rand(1, PHP_INT_MAX - 1),
			(string) rand(1, PHP_INT_MAX - 1)
		];
	}

	protected function invalidValueProvider()
	{
		return [
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
