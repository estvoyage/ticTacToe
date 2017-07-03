<?php namespace estvoyage\ticTacToe\coordinate;

interface recipient
{
	function lineAndColumnOfTicTacToeSymbolIs(int $line, int $column) :void;
}
