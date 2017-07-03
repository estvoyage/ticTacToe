<?php namespace estvoyage\ticTacToe\ninteger\generator;

use estvoyage\ticTacToe\block;

class increment
{
	private
		$start,
		$end,
		$step
	;

	function __construct(int $start, int $end, int $step)
	{
		$this->start = $start;
		$this->end = $end;
		$this->step = $step;
	}

	function ticTacToeBlockIs(block $block) :void
	{
		for ($ninteger = $this->start; $ninteger <= $this->end; $ninteger += $this->step)
		{
			$block->blockArgumentsAre($ninteger);
		}
	}
}
