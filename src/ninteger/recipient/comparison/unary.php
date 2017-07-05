<?php namespace estvoyage\ticTacToe\ninteger\recipient\comparison;

use estvoyage\ticTacToe\{ ninteger, nboolean };

class unary
	implements
		ninteger\recipient
{
	private
		$comparison,
		$recipient
	;

	function __construct(ninteger\comparison\unary $comparison, ninteger\comparison\unary\recipient $recipient)
	{
		$this->comparison = $comparison;
		$this->recipient = $recipient;
	}

	function nintegerIs(int $ninteger) :void
	{
		$this->comparison
			->recipientOfComparisonWithNIntegerIs(
				$ninteger,
				$this->recipient
			)
		;
	}
}
