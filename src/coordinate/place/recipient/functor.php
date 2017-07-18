<?php namespace estvoyage\ticTacToe\coordinate\place\recipient;

use estvoyage\ticTacToe\{ coordinate, block };

class functor extends block\functor
	implements
		coordinate\place\recipient
{
	function placeInTicTacToeBoardIs(coordinate\place $place) :void
	{
		parent::blockArgumentsAre($place);
	}
}
