<?php namespace estvoyage\ticTacToe\symbol\name\recipient\functor;

use estvoyage\ticTacToe\symbol;

class any extends symbol\name\recipient\functor
{
	function __construct(callable $callable)
	{
		parent::__construct($callable, $callable);
	}
}
