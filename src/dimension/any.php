<?php namespace estvoyage\ticTacToe\dimension;

use estvoyage\ticTacToe\{ dimension, ninteger, comparison, condition, block };

class any
	implements
		dimension
{
	private
		$width,
		$height
	;

	function __construct(int $width, $height)
	{
		(new ninteger\comparison\unary\lessThan)
			->recipientOfComparisonWithNIntegerIsCondition(
				$width,
				new condition\ifTrueError(
					new \typeError('First argument must be an integer greater than or equal to 0')
				)
			)
		;

		(new ninteger\comparison\unary\lessThan)
			->recipientOfComparisonWithNIntegerIsCondition(
				$height,
				new condition\ifTrueError(
					new \typeError('Second argument must be an integer greater than or equal to 0')
				)
			)
		;
	}
}
