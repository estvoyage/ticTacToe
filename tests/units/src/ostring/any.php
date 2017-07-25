<?php namespace estvoyage\ticTacToe\tests\units\ostring;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\{ tests\units, block };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\ostring')
		;
	}

	function test__construct()
	{
		$this
			->given(
				$nstring = uniqid()
			)
			->if(
				$this->newTestedInstance($nstring)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($nstring, new block\blackhole))
		;
	}

	/**
	 * @dataProvider invalidValueProvider
	 */
	function test__construct_withInvalidValue($value)
	{
		$this
			->given(
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->newTestedInstance($value, $block)
			)
			->then
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($value)
							->once
		;
	}

	/**
	 * @dataProvider nstringProvider
	 */
	function test__construct_withNstring($value)
	{
		$this
			->given(
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->newTestedInstance($value, $block)
			)
			->then
				->mock($block)
					->receive('blockArgumentsAre')
						->never
		;
	}

	/**
	 * @dataProvider nstringProvider
	 */
	function testRecipientOfNStringIs_withNString($value)
	{
		$this
			->given(
				$this->newTestedInstance($value, $block = new mockOfTicTacToe\block),
				$recipient = new mockOfTicTacToe\nstring\recipient
			)
			->if(
				$this->testedInstance->recipientOfNStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($value, $block))
				->mock($recipient)
					->receive('nstringIs')
						->withArguments((string) $value)
							->once
		;
	}

	protected function nstringProvider()
	{
		return [
			'',
			uniqid(),
			(string) rand(PHP_INT_MIN, PHP_INT_MAX),
			(string) M_PI
		];
	}

	protected function invalidValueProvider()
	{
		return [
			[ [] ],
			new \stdClass,
			null,
			false,
			true,
			rand(PHP_INT_MIN, PHP_INT_MAX),
			M_PI
		];
	}
}
