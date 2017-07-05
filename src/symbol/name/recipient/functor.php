<?php namespace estvoyage\ticTacToe\symbol\name\recipient;

use estvoyage\ticTacToe;

class functor extends block
{
	function __construct(callable $callableForX, callable $callableForO)
	{
		parent::__construct(new ticTacToe\block\functor($callableForX), new ticTacToe\block\functor($callableForO));
	}
}
