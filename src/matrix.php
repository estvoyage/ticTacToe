<?php namespace estvoyage\ticTacToe;

interface matrix
{
	function recipientOfValueInMatrixAtCoordinateIs(matrix\coordinate $coordinate, matrix\value\recipient $recipient) :void;
	function recipientOfMatrixWithValueAtCoordinateIs($value, matrix\coordinate $coordinate, matrix\recipient $recipient) :void;
}
