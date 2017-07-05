<?php namespace estvoyage\ticTacToe\nboolean\recipient;

use estvoyage\{ ticTacToe, ticTacToe\nboolean };

class functor extends block
{
	function __construct(callable $callable)
	{
		parent::__construct(new ticTacToe\block\functor($callable));
	}
}
