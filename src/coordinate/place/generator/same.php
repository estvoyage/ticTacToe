<?php namespace estvoyage\ticTacToe\coordinate\place\generator;

use estvoyage\ticTacToe\coordinate;

class same
	implements
		coordinate\place\generator
{
	function recipientOfPlaceInTicTacToeBoardFromPlaceIs(coordinate\place $place, coordinate\place\recipient $recipient) :void
	{
		$recipient->placeInTicTacToeBoardIs($place);
	}
}
