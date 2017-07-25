<?php namespace estvoyage\ticTacToe;

interface board
{
	function recipientOfTicTacToeSymbolAtCoordinateIs(coordinate $coordinate, symbol\recipient $recipient) :void;
	function recipientOfTicTacToeBoardWithSymbolAtCoordinateIs(symbol $symbol, coordinate $coordinate, board\recipient $recipient) :void;
	function recipientOfMaximumCoordinateOfTicTacToeBoardIs(coordinate\recipient $recipient) :void;
}
