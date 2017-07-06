<?php namespace estvoyage\ticTacToe\ointeger;

use estvoyage\ticTacToe\condition;

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

}
