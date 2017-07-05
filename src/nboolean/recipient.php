<?php namespace estvoyage\ticTacToe\nboolean;

interface recipient
{
	function nbooleanIs(bool $boolean) :void;
	function recipientOfNBooleanRecipientWithArgumentsIs(array $arguments, recipient\recipient $recipient) :void;
}
