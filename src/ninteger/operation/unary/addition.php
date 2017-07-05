<?php namespace estvoyage\ticTacToe\ninteger\operation\unary;

use estvoyage\ticTacToe\{ ninteger, block };

class addition extends ninteger\filter\type
	implements
		ninteger\operation\unary
{
	private
		$ninteger1
	;

	function __construct(int $ninteger1, block $overflow = null)
	{
		parent::__construct($overflow);

		$this->ninteger1 = $ninteger1;
	}

	function recipientOfOperationWithNIntegerIs(int $ninteger, ninteger\recipient $recipient) :void
	{
		parent::nIntegerRecipientForValueIs(
			$this->ninteger1 + $ninteger,
			$recipient
		);
	}
}
