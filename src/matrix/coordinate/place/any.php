<?php namespace estvoyage\ticTacToe\matrix\coordinate\place;

use estvoyage\ticTacToe\{ matrix\coordinate, ointeger, ninteger, condition, block, exception };

class any
	implements
		coordinate\place
{
	private
		$ointeger
	;

	function __construct($value)
	{
		(
			new exception\catcher\error(
				new \typeError('Value should be an integer greater than 0')
			)
		)
			->blockIs(
				new block\functor(
					function() use ($value)
					{
						(new coordinate\place\comparison\unary\lessThan\ointeger($this->ointeger = new ointeger\unsigned\any($value)))
							->conditionForComparisonWithPlaceInMatrixIs(
								new coordinate\place\origin,
								new condition\ifTrueError(new \typeError)
							)
						;
					}
				)
			)
		;
	}

	function recipientOfNIntegerGreaterThanZeroIs(ninteger\recipient $recipient) :void
	{
		$this->ointeger
			->recipientOfValueOfOIntegerIs(
				$recipient
			)
		;
	}
}
