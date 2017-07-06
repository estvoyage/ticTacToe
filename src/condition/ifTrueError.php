<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\{ condition, block };

class ifTrueError extends ifFalseErrorElse
{
	function __construct(\error $error)
	{
		parent::__construct($error, new block\blackhole);
	}

	function nbooleanIs(bool $boolean) :void
	{
		parent::nbooleanIs(! $boolean);
	}
}
