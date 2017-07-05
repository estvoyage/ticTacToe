<?php namespace estvoyage\ticTacToe\symbol\name\recipient;

use estvoyage\{ ticTacToe, ticTacToe\symbol };

class block
	implements
		symbol\name\recipient
{
	private
		$x,
		$y
	;

	function __construct(ticTacToe\block $x, ticTacToe\block $o)
	{
		$this->x = $x;
		$this->o = $o;
	}

	function ticTacToeSymbolIsX() :void
	{
		$this->x->blockArgumentsAre();
	}

	function ticTacToeSymbolIsO() :void
	{
		$this->o->blockArgumentsAre();
	}
}
