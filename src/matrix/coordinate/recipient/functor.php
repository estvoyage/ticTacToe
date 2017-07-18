<?php namespace estvoyage\ticTacToe\matrix\coordinate\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\coordinate\recipient
{
	function matrixCoordinateIs(matrix\coordinate $coordinate) :void
	{
		parent::blockArgumentsAre($coordinate);
	}
}
