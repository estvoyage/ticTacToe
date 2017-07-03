<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\nboolean;

class between
{
	private
		$down,
		$up
	;

	function __construct($down, $up)
	{
		$this->down = $down;
		$this->up = $up;
	}

	function recipientOfComparisonWithNIntegerIs(int $ninteger, nboolean\recipient $recipient) :void
	{
		$recipient->nbooleanIs($ninteger >= $this->down && $ninteger <= $this->up);
	}
}
