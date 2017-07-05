<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\{ ninteger\comparison, nboolean };

class any
	implements
		comparison\unary
{
	private
		$ninteger,
		$comparison
	;

	function __construct(int $ninteger, comparison\binary $comparison)
	{
		$this->ninteger = $ninteger;
		$this->comparison = $comparison;
	}

	function recipientOfComparisonWithNIntegerIs(int $ninteger, comparison\unary\recipient $recipient) :void
	{
		$this
			->recipientOfComparisonWithNIntegerIsNBooleanRecipient(
				$ninteger,
				new nboolean\recipient\functor(
					function($boolean) use ($ninteger, $recipient)
					{
						$recipient->comparisonWithNIntegerIs($ninteger, $boolean);
					}
				)
			)
		;
	}

	function recipientOfComparisonWithNIntegerIsNBooleanRecipient(int $ninteger, nboolean\recipient $recipient) :void
	{
		$this->comparison
			->recipientOfComparisonBetweenNIntegerAndNIntegerIs(
				$ninteger,
				$this->ninteger,
				$recipient
			)
		;
	}
}
