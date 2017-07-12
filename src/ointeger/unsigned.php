<?php namespace estvoyage\ticTacToe\ointeger;

use estvoyage\ticTacToe\{ condition, ointeger, block };

class unsigned extends any
{
	function __construct($value = 0)
	{
		try
		{
			parent::__construct($value);

			(new comparison\unary\lessThan(new any))
				->recipientOfComparisonWithOIntegerIsCondition(
					$this,
					new condition\ifTrueError(new \typeError)
				)
			;
		}
		catch (\typeError $error)
		{
			throw new \typeError('Value should be an unsigned integer');
		}
	}

	function recipientOfOIntegerWithValueIs($value, ointeger\recipient $recipient) :void
	{
		parent::recipientOfOIntegerWithValueIs(
			$value,
			new ointeger\recipient\functor(
				function($ointeger) use ($recipient) {
					(new comparison\unary\lessThan(new any))
						->recipientOfComparisonWithOIntegerIsCondition(
							$ointeger,
							new condition\ifFalseFunctor(
								function() use ($ointeger, $recipient) {
									$recipient->ointegerIs($ointeger);
								}
							)
						)
					;
				}
			)
		);
	}
}
