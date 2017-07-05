<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe;

class functor extends block
{
	function __construct(callable $callable)
	{
		parent::__construct(new ticTacToe\block\functor($callable));
	}
}
