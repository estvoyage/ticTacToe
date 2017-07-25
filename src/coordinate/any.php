<?php namespace estvoyage\ticTacToe\coordinate;

use estvoyage\ticTacToe\coordinate;

class any
	implements
		coordinate
{
	private
		$row,
		$column
	;

	function __construct(coordinate\place $row, coordinate\place $column)
	{
		$this->row = $row;
		$this->column = $column;
	}

	function recipientOfPlaceInTicTacToeBoardRowsIs(coordinate\place\recipient $recipient) :void
	{
		$recipient->placeInTicTacToeBoardIs($this->row);
	}

	function recipientOfPlaceInTicTacToeBoardColumnsIs(coordinate\place\recipient $recipient) :void
	{
		$recipient->placeInTicTacToeBoardIs($this->column);
	}
}
