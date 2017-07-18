<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary;

use estvoyage\ticTacToe\{ ninteger, condition };

class lessThanOrEqualTo
	implements
		ninteger\comparison\unary
{
	private
		$ninteger
	;

	function __construct(int $ninteger)
	{
		$this->ninteger = $ninteger;
	}

	function recipientOfComparisonWithNIntegerIs(int $ninteger, ninteger\comparison\unary\recipient $recipient) :void
	{

	}

	function recipientOfComparisonWithNIntegerIsCondition(int $ninteger, condition $condition) :void
	{
		$condition->nbooleanIs($ninteger <= $this->ninteger);
	}
}
