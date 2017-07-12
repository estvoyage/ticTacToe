<?php namespace estvoyage\ticTacToe;

interface matrix
{
	function recipientOfMatrixValueAtCoordinateIs(matrix\coordinate $coordinate, matrix\value\recipient $recipient) :void;
}
