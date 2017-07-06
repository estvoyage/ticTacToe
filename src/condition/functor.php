<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe;

class functor extends block
{
	function __construct(callable $callable)
	{
		parent::__construct(new ticTacToe\block\functor($callable));
	}
}
