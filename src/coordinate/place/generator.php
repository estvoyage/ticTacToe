<?php namespace estvoyage\ticTacToe\coordinate\place;

use estvoyage\ticTacToe\coordinate;

interface generator
{
	function recipientOfPlaceInTicTacToeBoardFromPlaceIs(coordinate\place $place, coordinate\place\recipient $recipient) :void;
}
