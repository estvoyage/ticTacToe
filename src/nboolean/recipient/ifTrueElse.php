<?php namespace estvoyage\ticTacToe\nboolean\recipient;

use estvoyage\ticTacToe\{ nboolean, block };

class ifTrueElse
	implements
		nboolean\recipient
{
	private
		$true,
		$false,
		$arguments
	;

	function __construct(block $true, block $false, array $arguments = [])
	{
		$this->true = $true;
		$this->false = $false;
		$this->arguments = $arguments;
	}

	function nbooleanIs(bool $bool) :void
	{
		($bool ? $this->true : $this->false)->blockArgumentsAre(... $this->arguments);
	}

	function recipientOfNBooleanRecipientWithArgumentsIs(array $arguments, recipient $recipient) :void
	{
		$self = clone $this;
		$self->arguments = $arguments;

		$recipient->nbooleanRecipientIs($self);
	}
}
