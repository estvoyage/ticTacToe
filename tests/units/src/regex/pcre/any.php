<?php namespace estvoyage\ticTacToe\tests\units\regex\pcre;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\regex\pcre')
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
				->hasMessage('Value should be a valid PCRE pattern')
		;
	}

	function testRecipientOfPcreRegexAsNStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($nstring = '/' . uniqid() . '/'),
				$recipient = new mockOfTicTacToe\nstring\recipient
			)
			->if(
				$this->testedInstance->recipientOfPcreRegexAsNStringIs($recipient)
			)
			->then
				->mock($recipient)
					->receive('nstringIs')
						->withArguments($nstring)
							->once
		;
	}

	protected function invalidValueProvider()
	{
		return [
			'',
			'/foo',
			'foo/',
			'#foo/',
			[ [] ],
			new \stdClass,
			null,
			false,
			true,
			uniqid()
		];
	}
}
