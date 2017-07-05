<?php namespace estvoyage\ticTacToe\nboolean\recipient;

use estvoyage\ticTacToe\nboolean;

interface withArguments extends nboolean\recipient
{
	function recipientOfNBooleanRecipientWithArgumentsIs(array $arguments, nboolean\recipient\recipient $recipient) :void;
}
