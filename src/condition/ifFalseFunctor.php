<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\{ condition, block };

class ifFalseFunctor extends ifFalse
	implements
		condition
{
	function __construct(callable $callable)
	{
		parent::__construct(new block\functor($callable));
	}
}
