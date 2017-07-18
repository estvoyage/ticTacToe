<?php namespace estvoyage\ticTacToe;

interface coordinate
{
	function recipientOfPlaceInTicTacToeBoardRowsIs(coordinate\place\recipient $recipient) :void;
	function recipientOfPlaceInTicTacToeBoardColumnsIs(coordinate\place\recipient $recipient) :void;
}
