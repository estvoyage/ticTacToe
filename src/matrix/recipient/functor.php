<?php namespace estvoyage\ticTacToe\matrix\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\recipient
{
	function matrixIs(matrix $matrix) :void
	{
		parent::blockArgumentsAre($matrix);
	}
}
