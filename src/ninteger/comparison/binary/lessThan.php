<?php namespace estvoyage\ticTacToe\ninteger\comparison\binary;

use estvoyage\ticTacToe\{ ninteger\comparison, nboolean };

class lessThan
	implements
		comparison\binary
{
	function recipientOfComparisonBetweenNIntegerAndNIntegerIs(int $ninteger1, int $ninteger2, nboolean\recipient $recipient) :void
	{
		$recipient
			->nbooleanIs(
				$ninteger1 < $ninteger2
			)
		;
	}
}
