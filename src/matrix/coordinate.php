<?php namespace estvoyage\ticTacToe\matrix;

use estvoyage\ticTacToe\{ matrix\coordinate\place, matrix\coordinate };

interface coordinate
{
	function recipientOfPlaceInMatrixRowsIs(place\recipient $recipient) :void;
	function recipientOfPlaceInMatrixColumnsIs(place\recipient $recipient) :void;
	function recipientOfMatrixCoordinateWithRowAndColumnIs(place $row, place $column, coordinate\recipient $recipient) :void;
}
