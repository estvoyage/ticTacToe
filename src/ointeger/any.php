<?php namespace estvoyage\ticTacToe\ointeger;

use estvoyage\ticTacToe\{ ointeger, ninteger, condition, block };

class any
	implements
		ointeger
{
	private
		$value
	;

	function __construct($value = 0)
	{
		(
			new condition\ifFalseErrorElse(
				new \typeError('Value should be an integer'),
				new block\functor(
					function() use ($value)
					{
						$this->value = (int) $value;
					}
				)
			)
		)
			->nbooleanIs(is_numeric($value) && (int) $value == $value)
		;
	}

	function recipientOfValueOfOIntegerIs(ninteger\recipient $recipient) :void
	{
		$recipient->nintegerIs($this->value);
	}

	function recipientOfOIntegerWithValueIs($value, ointeger\recipient $recipient) :void
	{
		(
			new condition\ifTrue(
				new block\functor(
					function() use ($recipient, $value)
					{
						$ointeger = clone $this;
						$ointeger->value = (int) $value;

						$recipient->ointegerIs($ointeger);
					}
				)
			)
		)
			->nbooleanIs(is_numeric($value) && (int) $value == $value)
		;
	}
}
