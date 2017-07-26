<?php namespace estvoyage\ticTacToe\ninteger\generator;

use estvoyage\ticTacToe\ninteger;

class between
{
	private
		$start,
		$end
	;

	function __construct(int $start, int $end)
	{
		$this->start = $start;
		$this->end = $end;
	}

	function recipientOfNIntegerIs(ninteger\recipient $recipient) :void
	{
		for ($current = $this->start; $current <= $this->end; $current++)
		{
			$recipient->nintegerIs($current);
		}
	}
}
