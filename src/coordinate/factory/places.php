<?php namespace estvoyage\ticTacToe\coordinate\factory;

use estvoyage\ticTacToe\coordinate;

interface places
{
	function recipientOfTicTacToeCoordinateWithRowAndColumnIs(coordinate\place $row, coordinate\place $column, coordinate\recipient $recipient) :void;
}
