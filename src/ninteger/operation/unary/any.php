<?php namespace estvoyage\ticTacToe\ninteger\operation\unary;

use estvoyage\ticTacToe\ninteger;

class any
	implements
		ninteger\operation\unary
{
	private
		$ninteger,
		$operation
	;

	function __construct(int $ninteger, ninteger\operation\binary $operation)
	{
		$this->ninteger = $ninteger;
		$this->operation = $operation;
	}

	function recipientOfOperationWithNIntegerIs(int $ninteger, ninteger\recipient $recipient) :void
	{
		$this->operation->recipientOfOperationWithNIntegerAndNIntegerIs($this->ninteger, $ninteger, $recipient);
	}
}
