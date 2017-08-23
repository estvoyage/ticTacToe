<?php namespace estvoyage\ticTacToe\tests\units\php\classname;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\php\classname')
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
				->hasMessage('Value should be a string which match PCRE pattern \'/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/\'')
		;
	}

	function testRecipientOfPhpClassNameAsNstringIs()
	{
		$this
			->given(
				$this->newTestedInstance('foo'),
				$recipient = new mockOfTicTacToe\nstring\recipient
			)
			->if(
				$this->testedInstance->recipientOfPhpClassNameAsNStringIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance('foo'))
				->mock($recipient)
					->receive('nstringIs')
						->withArguments('foo')
							->once
		;
	}

	protected function invalidValueProvider()
	{
		return [
			'',
			rand(PHP_INT_MIN, PHP_INT_MAX) . 'foo',
			'.foo',
			'.foo.',
			'foo.',
			'-foo',
			'-foo-',
			'foo-',
			'foo bar',
			' foobar',
			' foobar ',
			'\foobar',
			'foo\bar'
		];
	}
}
