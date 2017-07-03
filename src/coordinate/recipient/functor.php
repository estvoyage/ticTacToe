<?php namespace estvoyage\ticTacToe\coordinate\recipient;

use estvoyage\ticTacToe\coordinate;

class functor
	implements
		coordinate\recipient
{
	private
		$callable
	;

	function __construct(callable $callable)
	{
		$this->callable = $callable;
	}

	function lineAndColumnOfTicTacToeSymbolIs(int $line, int $column) :void
	{
		call_user_func_array($this->callable, func_get_args());
	}
}
