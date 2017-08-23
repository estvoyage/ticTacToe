<?php namespace estvoyage\ticTacToe\php\classname;

use estvoyage\ticTacToe\{ nstring, regex, condition, php };

class any
	implements
		php\classname
{
	private
		$value
	;

	private const pattern = '/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/';

	function __construct(string $value)
	{
		(
			new nstring\comparison\unary\regex\pcre(
				new regex\pcre\any(self::pattern)
			)
		)
			->conditionForComparisonWithNStringIs(
				$value,
				new condition\ifFalseError(
					new \typeError('Value should be a string which match PCRE pattern \'' . self::pattern . '\'')
				)
			)
		;

		$this->value = $value;
	}

	function recipientOfPhpClassNameAsNStringIs(nstring\recipient $recipient) :void
	{
		$recipient->nstringIs($this->value);
	}
}
