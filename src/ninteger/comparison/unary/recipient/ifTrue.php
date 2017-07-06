<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe\{ ninteger, block, condition };

class ifTrue extends block\functor
	implements
		ninteger\comparison\unary\recipient
{
	function comparisonWithNIntegerIs(int $ninteger, bool $boolean) :void
	{
		(
			new condition\ifTrueElse(
				new block\functor(
					function() use ($ninteger) { parent::blockArgumentsAre($ninteger); }
				),
				new block\blackhole
			)
		)
			->nbooleanIs($boolean)
		;
	}
}
