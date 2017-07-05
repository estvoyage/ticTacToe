<?php namespace estvoyage\ticTacToe\coordinate\recipient;

use estvoyage\{ ticTacToe, ticTacToe\coordinate };

class block extends ticTacToe\block\proxy
	implements
		coordinate\recipient
{
	function lineAndColumnOfTicTacToeSymbolIs(int $line, int $column) :void
	{
		parent::blockArgumentsAre($line, $column);
	}
}
