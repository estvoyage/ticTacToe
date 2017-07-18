<?php namespace estvoyage\ticTacToe\matrix\value;

use estvoyage\ticTacToe\matrix;

class any
	implements
		matrix\value
{
	private
		$value,
		$coordinate
	;

	function __construct($value, matrix\coordinate $coordinate)
	{
		$this->value = $value;
		$this->coordinate = $coordinate;
	}

	function recipientOfMatrixCoordinateIs(matrix\coordinate\recipient $recipient) :void
	{
		$recipient->matrixCoordinateIs($this->coordinate);
	}

	function recipientOfMatrixValueIs(matrix\value\recipient $recipient) :void
	{
		$recipient->matrixValueIs($this->value);
	}
}
