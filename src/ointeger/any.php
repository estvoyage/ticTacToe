<?php namespace estvoyage\ticTacToe\ointeger;

use estvoyage\ticTacToe\{ ointeger, ninteger, condition, block, mixed };

class any
	implements
		ointeger
{
	private
		$value
	;

	function __construct($value = 0)
	{
		(new mixed\comparison\unary\with\integer\type)
			->conditionForComparisonWithMixedIs(
				$value,
				new condition\ifFalseError(
					new \typeError('Value should be an integer')
				)
			)
		;

		$this->value = (int) $value;
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
