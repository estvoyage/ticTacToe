<?php namespace estvoyage\ticTacToe\matrix\coordinate\distance;

use estvoyage\ticTacToe\{ matrix, ointeger, ninteger, condition };

class any
	implements
		matrix\coordinate\distance
{
	private
		$ointeger
	;

	function __construct($value)
	{
		try
		{
			$this->ointeger = new ointeger\unsigned\any($value);

			(new ointeger\comparison\unary\lessThan(new ointeger\any(1)))
				->recipientOfComparisonWithOIntegerIsCondition(
					$this->ointeger,
					new condition\ifTrueError(new \typeError)
				)
			;
		}
		catch (\typeError $error)
		{
			throw new \typeError('Value should be an integer greater than 0');
		}
	}

	function recipientOfNIntegerGreaterThanZeroIs(ninteger\recipient $recipient) :void
	{
		$this->ointeger
			->recipientOfValueOfOIntegerIs(
				$recipient
			)
		;
	}

	private static function conditionForOIntegerIs(ointeger $ointeger, condition $condition) :void
	{
		(new ointeger\comparison\unary\lessThan(new ointeger\any(1)))
			->recipientOfComparisonWithOIntegerIsCondition(
				$ointeger,
				$condition
			)
		;
	}
}
