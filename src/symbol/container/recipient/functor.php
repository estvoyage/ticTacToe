<?php namespace estvoyage\ticTacToe\symbol\container\recipient;

use estvoyage\ticTacToe\symbol;

class functor
	implements
		symbol\container\recipient
{
	private
		$callable
	;

	function __construct(callable $callable)
	{
		$this->callable = $callable;
	}

	function ticTacToeSymbolContainerIs(symbol\container $container) :void
	{
		call_user_func_array($this->callable, func_get_args());
	}
}
