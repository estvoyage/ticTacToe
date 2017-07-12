<?php namespace estvoyage\ticTacToe\matrix\value\recipient\future;

use estvoyage\{ ticTacToe, ticTacToe\matrix };

class block extends ticTacToe\future\block
	implements
		matrix\value\recipient
{
	function matrixValueIs($value) :void
	{
		parent::valueIs($value);
	}
}
