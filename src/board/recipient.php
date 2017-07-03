<?php namespace estvoyage\ticTacToe\board;

use estvoyage\ticTacToe\{ board, symbol, coordinate };

interface recipient
{
	function ticTacToeBoardIs(board $board);
	function invalidCoordinateForTicTacToeSymbol(coordinate $coordinate, symbol $symbol) :void;
	function overlapCoordinateForTicTacToeSymbol(coordinate $coordinate, symbol $symbol) :void;
}
