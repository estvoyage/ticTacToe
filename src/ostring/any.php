<?php namespace estvoyage\ticTacToe\ostring;

use estvoyage\ticTacToe\{ ostring, nstring, condition, block };

class any
	implements
		ostring
{
	private
		$value
	;

	function __construct($value, block $invalidValue = null)
	{
		(
			new condition\ifTrueElse(
				new block\functor(
					function() use ($value)
					{
						$this->value = (string) $value;
					}
				),
				new block\functor(
					function() use ($value, $invalidValue)
					{
						($invalidValue ?: new block\blackhole)->blockArgumentsAre($value);
					}
				)
			)
		)
			->nbooleanIs(is_string($value))
		;
	}

	function recipientOfNStringIs(nstring\recipient $recipient) :void
	{
		$recipient->nstringIs($this->value);
	}
}
