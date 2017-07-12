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

	function recipientOfRowInMatrixIs(matrix\coordinate\row\recipient $recipient) :void
	{
		$recipient->rowInMatrixIs($this->row);
	}

	function recipientOfColumnInMatrixIs(matrix\coordinate\column\recipient $recipient) :void
	{
		$recipient->columnInMatrixIs($this->column);
	}
}
