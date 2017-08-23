<?php namespace estvoyage\ticTacToe\regex\pcre;

use estvoyage\ticTacToe\{ condition, nstring, block, regex };

class any
	implements
		regex\pcre
{
	private
		$value
	;

	function __construct($value)
	{
		(
			new block\at(
				new block\functor(
					function($value)
					{
						(
							new condition\ifTrueError(
								new \typeError('Value should be a valid PCRE pattern')
							)
						)
							->nbooleanIs(preg_match($value, null) === false)
						;

						$this->value = $value;
					}
				)
			)
		)
			->blockArgumentsAre($value)
		;
	}

	function recipientOfPcreRegexAsNStringIs(nstring\recipient $recipient) :void
	{
		$recipient->nstringIs($this->value);
	}
}
