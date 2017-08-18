<?php namespace estvoyage\ticTacToe\matrix\coordinate\place;

use estvoyage\ticTacToe\{ ninteger, matrix\coordinate };

class origin
	implements
		coordinate\place
{
	function recipientOfNIntegerGreaterThanZeroIs(ninteger\recipient $recipient) :void
	{
		$recipient->nintegerIs(1);
	}
}
