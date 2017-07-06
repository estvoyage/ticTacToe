<?php namespace estvoyage\ticTacToe\ninteger\comparison\binary;

use estvoyage\ticTacToe\{ ninteger\comparison, condition };

class lessThan
	implements
		comparison\binary
{
	function recipientOfComparisonBetweenNIntegerAndNIntegerIs(int $ninteger1, int $ninteger2, condition $condition) :void
	{
		$condition
			->nbooleanIs(
				$ninteger1 < $ninteger2
			)
		;
	}
}
