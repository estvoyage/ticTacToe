<?php namespace estvoyage\ticTacToe\matrix\value\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\value\recipient
{
	function matrixValueIs($value) :void
	{
		parent::blockArgumentsAre($value);
	}
}
