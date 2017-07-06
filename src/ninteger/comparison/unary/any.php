<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\{ ninteger\comparison, condition };

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
			->recipientOfComparisonWithNIntegerIsCondition(
				$ninteger,
				new condition\functor(
					function($boolean) use ($ninteger, $recipient)
					{
						$recipient->comparisonWithNIntegerIs($ninteger, $boolean);
					}
				)
			)
		;
	}

	function recipientOfComparisonWithNIntegerIsCondition(int $ninteger, condition $condition) :void
	{
		$this->comparison
			->recipientOfComparisonBetweenNIntegerAndNIntegerIs(
				$ninteger,
				$this->ninteger,
				$condition
			)
		;
	}
}
