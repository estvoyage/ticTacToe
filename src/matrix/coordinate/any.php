<?php namespace estvoyage\ticTacToe\matrix\coordinate;

use estvoyage\ticTacToe\matrix\coordinate;

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

	function recipientOfPlaceInMatrixRowsIs(coordinate\place\recipient $recipient) :void
	{
		$recipient->placeInMatrixIs($this->row);
	}

	function recipientOfPlaceInMatrixColumnsIs(coordinate\place\recipient $recipient) :void
	{
		$recipient->placeInMatrixIs($this->column);
	}

	function recipientOfMatrixCoordinateWithRowAndColumnIs(coordinate\place $row, coordinate\place $column, coordinate\recipient $recipient) :void
	{
		$self = clone $this;
		$self->row = $row;
		$self->column = $column;

		$recipient->matrixCoordinateIs($self);
	}
}
