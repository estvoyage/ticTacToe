<?php namespace estvoyage\ticTacToe\coordinate\place;

use estvoyage\ticTacToe\{ coordinate, ninteger };

class origin
	implements
		coordinate\place
{
	function recipientOfNIntegerGreaterThanZeroIs(ninteger\recipient $recipient) :void
	{
		$recipient->nintegerIs(1);
	}
}
