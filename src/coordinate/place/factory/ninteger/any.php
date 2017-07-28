<?php namespace estvoyage\ticTacToe\coordinate\place\factory\ninteger;

use estvoyage\ticTacToe\coordinate;

class any
	implements
		coordinate\place\factory\ninteger
{
	function recipientOfPlaceInTicTacToeBoardBuildWithNIntegerIs(int $ninteger, coordinate\place\recipient $recipient) :void
	{
		$recipient->placeInTicTacToeBoardIs(new coordinate\place\any($ninteger));
	}
}
