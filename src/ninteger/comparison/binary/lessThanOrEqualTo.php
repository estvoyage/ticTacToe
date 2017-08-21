<?php namespace estvoyage\ticTacToe\ninteger\comparison\binary;

use estvoyage\ticTacToe\{ ninteger, condition };

class lessThanOrEqualTo
	implements
		ninteger\comparison\binary
{
	function conditionOfComparisonBetweenNIntegerAndNIntegerIs(int $ninteger1, int $ninteger2, condition $condition) :void
	{
		$condition
			->nbooleanIs(
				$ninteger1 <= $ninteger2
			)
		;
	}
}
