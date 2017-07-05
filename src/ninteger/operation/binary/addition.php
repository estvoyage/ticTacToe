<?php namespace estvoyage\ticTacToe\ninteger\operation\binary;

use estvoyage\ticTacToe\{ ninteger, block };

class addition extends ninteger\filter\type
	implements
		ninteger\operation\binary
{
	function recipientOfOperationWithNIntegerAndNIntegerIs(int $ninteger1, int $ninteger2, ninteger\recipient $recipient) :void
	{
		parent::nIntegerRecipientForValueIs(
			$ninteger1 + $ninteger2,
			$recipient
		);
	}
}
