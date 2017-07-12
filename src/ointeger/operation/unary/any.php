<?php namespace estvoyage\ticTacToe\ointeger\operation\unary;

use estvoyage\ticTacToe\ointeger;

class any
	implements
		ointeger\operation\unary
{
	private
		$ointeger,
		$operation
	;

	function __construct(ointeger $ointeger, ointeger\operation\binary $operation)
	{
		$this->ointeger = $ointeger;
		$this->operation = $operation;
	}

	function recipientOfOperationWithOIntegerIs(ointeger $ointeger, ointeger\recipient $recipient) :void
	{
		$this->operation
			->recipientOfOperationWithOIntegerAndOIntegerIs(
				$ointeger,
				$this->ointeger,
				$recipient
			)
		;
	}
}
