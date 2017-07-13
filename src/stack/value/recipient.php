<?php namespace estvoyage\ticTacToe\stack\value;

use estvoyage\ticTacToe\stack;

interface recipient
{
	function stackWithoutValueIs($value, stack $stack) :void;
}
