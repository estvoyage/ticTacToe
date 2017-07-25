<?php namespace estvoyage\ticTacToe\coordinate\recipient;

use estvoyage\{ ticTacToe, ticTacToe\coordinate };

class block extends ticTacToe\block\proxy
	implements
		coordinate\recipient
{
	function coordinateInTicTacToeBoardIs(coordinate $coordinate) :void
	{
		parent::blockArgumentsAre($coordinate);
	}
}
