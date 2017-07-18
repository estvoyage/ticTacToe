<?php namespace estvoyage\ticTacToe\matrix\coordinate\place\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\coordinate\place\recipient
{
	function placeInMatrixIs(matrix\coordinate\place $place) :void
	{
		parent::blockArgumentsAre($place);
	}
}
