<?php namespace estvoyage\ticTacToe\future;

use estvoyage\ticTacToe;

class functor extends block
{
	function __construct(callable $forValue, callable $ifNoBinding)
	{
		parent::__construct(new ticTacToe\block\functor($forValue), new ticTacToe\block\functor($ifNoBinding));
	}

}
