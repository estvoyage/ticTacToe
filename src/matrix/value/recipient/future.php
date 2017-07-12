<?php namespace estvoyage\ticTacToe\matrix\value\recipient;

use estvoyage\{ ticTacToe, ticTacToe\matrix, ticTacToe\block };

class future extends ticTacToe\future
	implements
		matrix\value\recipient
{
	function matrixValueIs($value) :void
	{
		parent::valueIs($value);
	}
}
