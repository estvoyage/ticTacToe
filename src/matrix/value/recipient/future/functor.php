<?php namespace estvoyage\ticTacToe\matrix\value\recipient\future;

use estvoyage\{ ticTacToe, ticTacToe\matrix, ticTacToe\block };

class functor extends ticTacToe\future\functor
	implements
		matrix\value\recipient
{
	function matrixValueIs($value) :void
	{
		parent::valueIs($value);
	}
}
