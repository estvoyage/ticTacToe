<?php namespace estvoyage\ticTacToe\ointeger\recipient\comparison;

use estvoyage\ticTacToe\{ ointeger, condition };

class unary
	implements
		ointeger\recipient
{
	private
		$comparison,
		$condition
	;

	function __construct(ointeger\comparison\unary $comparison, condition $condition)
	{
		$this->comparison = $comparison;
		$this->condition = $condition;
	}

	function ointegerIs(ointeger $ointeger) :void
	{
		$this->comparison
			->conditionOfComparisonWithOIntegerIs(
				$ointeger,
				$this->condition
			)
		;
	}
}
