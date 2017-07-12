<?php namespace estvoyage\ticTacToe\matrix\coordinate\row\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\coordinate\row\recipient
{
	function rowInMatrixIs(matrix\coordinate\distance $row) :void
	{
		parent::blockArgumentsAre($row);
	}
}
