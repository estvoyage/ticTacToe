<?php namespace estvoyage\ticTacToe\ninteger\recipient;

use estvoyage\ticTacToe\ninteger;

class switcher
	implements
		ninteger\recipient
{
	private
		$number,
		$recipient,
		$otherRecipient
	;

	function __construct(int $number, ninteger\recipient $recipient, ninteger\recipient $otherRecipient)
	{
		$this->number = $number;
		$this->recipient = $recipient;
		$this->otherRecipient = $otherRecipient;
	}

	function nintegerIs(int $ninteger) :void
	{
		if ($this->number > 0)
		{
			$this->number--;
		}

		($this->number > 0 ? $this->recipient : $this->otherRecipient)->nintegerIs($ninteger);
	}
}
