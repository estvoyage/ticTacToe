<?php namespace estvoyage\ticTacToe\coordinate\factory\places;

use estvoyage\ticTacToe\coordinate;

class any
	implements
		coordinate\factory\places
{
	function recipientOfTicTacToeCoordinateWithRowAndColumnIs(coordinate\place $row, coordinate\place $column, coordinate\recipient $recipient) :void
	{
		$recipient->coordinateInTicTacToeBoardIs(new coordinate\any($row, $column));
	}
}
