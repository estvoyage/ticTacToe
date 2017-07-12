<?php namespace estvoyage\ticTacToe\ointeger\aggregator\ninteger;

use estvoyage\ticTacToe\{ ointeger, block, ninteger };

class stack
{
	private
		$nintegers
	;

	function __construct(int... $nintegers)
	{
		$this->nintegers = $nintegers;
	}

	function ointegerIs(ointeger $ointeger) :void
	{
		$ointeger
			->recipientOfValueOfOIntegerIs(
				new ninteger\recipient\functor(
					function($ninteger)
					{
						$this->nintegers[] = $ninteger;
					}
				)
			)
		;
	}

	function blockIs(block $block)
	{
		$block->blockArgumentsAre(... $this->nintegers);
	}
}
