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

	function conditionOfComparisonWithNIntegerIs(int $ninteger, condition $condition) :void
	{
		$this->comparison
			->conditionOfComparisonBetweenNIntegerAndNIntegerIs(
				$ninteger,
				$this->ninteger,
				$condition
			)
		;
	}
}
