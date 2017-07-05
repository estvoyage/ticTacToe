<?php namespace estvoyage\ticTacToe\dimension;

use estvoyage\ticTacToe\{ dimension, ninteger, comparison, nboolean, block };

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
			->recipientOfComparisonWithNIntegerIsNBooleanRecipient(
				$width,
				new nboolean\recipient\error(
					new \typeError('First argument must be an integer greater than or equal to 0')
				)
			)
		;

		(new ninteger\comparison\unary\lessThan)
			->recipientOfComparisonWithNIntegerIsNBooleanRecipient(
				$height,
				new nboolean\recipient\error(
					new \typeError('Second argument must be an integer greater than or equal to 0')
				)
			)
		;

		$this->width = $width;
		$this->height = $height;
	}
}
