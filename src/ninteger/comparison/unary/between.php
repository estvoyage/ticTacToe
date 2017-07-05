<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\{ ninteger, nboolean };

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
			->recipientOfComparisonWithNIntegerIsNBooleanRecipient(
				$ninteger,
				new nboolean\recipient\functor(
					function($boolean) use ($ninteger, $recipient)
					{
						$recipient->comparisonWithNIntegerIs($ninteger, $boolean);
					}
				)
			)
		;
	}

	function recipientOfComparisonWithNIntegerIsNBooleanRecipient(int $ninteger, nboolean\recipient $recipient) :void
	{
		$recipient->nbooleanIs($ninteger >= $this->down && $ninteger <= $this->up);
	}
}
