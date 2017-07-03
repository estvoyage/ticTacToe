<?php namespace estvoyage\ticTacToe\ninteger\operation\unary;

use estvoyage\ticTacToe\{ ninteger, block };

class multiplication
	implements
		ninteger\operation\unary
{
	private
		$ninteger1,
		$overflow
	;

	function __construct(int $ninteger1, block $overflow = null)
	{
		$this->ninteger1 = $ninteger1;
		$this->overflow = $overflow ?: new block\blackhole;
	}

	function recipientOfOperationWithNIntegerIs(int $ninteger, ninteger\recipient $recipient) :void
	{
		$operation = $this->ninteger1 * $ninteger;

		is_int($operation)
			?
			$recipient->nintegerIs($operation)
			:
			$this->overflow->blockArgumentsAre()
		;
	}
}
