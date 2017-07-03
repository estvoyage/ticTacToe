<?php namespace estvoyage\ticTacToe\block;

use estvoyage\ticTacToe\block;

class functor
	implements
		block
{
	private
		$callable
	;

	function __construct(callable $callable)
	{
		$this->callable = $callable;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		call_user_func_array($this->callable, $arguments);
	}
}
