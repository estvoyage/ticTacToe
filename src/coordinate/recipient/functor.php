<?php namespace estvoyage\ticTacToe\coordinate\recipient;

use estvoyage\ticTacToe\{ coordinate, block };

class functor extends block\functor
	implements
		coordinate\recipient
{
	function lineAndColumnOfTicTacToeSymbolIs(int $line, int $column) :void
	{
		parent::blockArgumentsAre($line, $column);
	}
}
