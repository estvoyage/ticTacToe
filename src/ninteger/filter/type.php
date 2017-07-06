<?php namespace estvoyage\ticTacToe\ninteger\filter;

use estvoyage\ticTacToe\{ ninteger, block, condition };

class type
	implements
		ninteger\filter
{
	private
		$block
	;

	function __construct(block $false = null)
	{
		$this->false = $false ?: new block\blackhole;
	}

	function nIntegerRecipientForValueIs($value, ninteger\recipient $recipient) :void
	{
		(
			new condition\ifTrueElse(
				new block\functor(
					function() use ($recipient, $value)
					{
						$recipient->nintegerIs($value);
					}
				),
				$this->false
			)
		)
			->nbooleanIs(is_int($value))
		;
	}
}
