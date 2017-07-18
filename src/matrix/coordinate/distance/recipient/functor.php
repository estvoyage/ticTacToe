<?php namespace estvoyage\ticTacToe\matrix\coordinate\distance\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\coordinate\distance\recipient
{
	function distanceInMatrixIs(matrix\coordinate\distance $distance) :void
	{
		parent::blockArgumentsAre($distance);
	}
}
