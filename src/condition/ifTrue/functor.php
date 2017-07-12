<?php namespace estvoyage\ticTacToe\condition\ifTrue;

use estvoyage\ticTacToe\{ condition, block };

class functor extends condition\ifTrue
{
	function __construct(callable $callable)
	{
		parent::__construct(new block\functor($callable));
	}
}
