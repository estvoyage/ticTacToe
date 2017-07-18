<?php namespace estvoyage\ticTacToe\matrix;

interface value
{
	function recipientOfMatrixCoordinateIs(coordinate\recipient $recipient) :void;
	function recipientOfMatrixValueIs(value\recipient $recipient) :void;
}
