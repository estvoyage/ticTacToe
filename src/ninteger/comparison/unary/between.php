<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\ninteger;

class between
	implements
		ninteger\comparison\unary
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

	function recipientOfComparisonWithNIntegerIs(int $ninteger, ninteger\comparison\unary\recipient $recipient) :void
	{
		$recipient->comparisonWithNIntegerIs($ninteger, $ninteger >= $this->down && $ninteger <= $this->up);
	}
}
