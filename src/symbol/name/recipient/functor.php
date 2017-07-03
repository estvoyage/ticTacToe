<?php namespace estvoyage\ticTacToe\symbol\name\recipient;

use estvoyage\ticTacToe\{ symbol, block };

class functor
	implements
		symbol\name\recipient
{
	private
		$callableForX,
		$callableForO
	;

	function __construct(callable $callableForX, callable $callableForO)
	{
		$this->callableForX = $callableForX;
		$this->callableForO = $callableForO;
	}

	function ticTacToeSymbolIsX() :void
	{
		call_user_func($this->callableForX);
	}

	function ticTacToeSymbolIsO() :void
	{
		call_user_func($this->callableForO);
	}
}
