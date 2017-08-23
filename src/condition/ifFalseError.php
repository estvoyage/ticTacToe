<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\condition;

class ifFalseError extends not
{
	function __construct(\error $error)
	{
		parent::__construct(new ifTrueError($error));
	}
}
