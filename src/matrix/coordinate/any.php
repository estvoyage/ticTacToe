<?php namespace estvoyage\ticTacToe\matrix\coordinate;

use estvoyage\ticTacToe\matrix;

class any
	implements
		matrix\coordinate
{
	private
		$row,
		$column
	;

	function __construct(matrix\coordinate\distance $row, matrix\coordinate\distance $column)
	{
		$this->row = $row;
		$this->column = $column;
	}

	function recipientOfDistanceInMatrixRowIs(matrix\coordinate\distance\recipient $recipient) :void
	{
		$recipient->distanceInMatrixIs($this->row);
	}

	function recipientOfDistanceInMatrixColumnIs(matrix\coordinate\distance\recipient $recipient) :void
	{
		$recipient->distanceInMatrixIs($this->column);
	}
}
