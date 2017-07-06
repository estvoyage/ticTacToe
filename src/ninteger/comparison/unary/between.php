<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\{ ninteger, condition };

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
		$this
			->recipientOfComparisonWithNIntegerIsCondition(
				$ninteger,
				new condition\functor(
					function($boolean) use ($ninteger, $recipient)
					{
						$recipient->comparisonWithNIntegerIs($ninteger, $boolean);
					}
				)
			)
		;
	}

	function recipientOfComparisonWithNIntegerIsCondition(int $ninteger, condition $condition) :void
	{
		$condition->nbooleanIs($ninteger >= $this->down && $ninteger <= $this->up);
	}
}
