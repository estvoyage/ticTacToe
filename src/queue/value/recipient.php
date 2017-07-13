<?php namespace estvoyage\ticTacToe\queue\value;

use estvoyage\ticTacToe\queue;

interface recipient
{
	function queueWithoutValueIs($value, queue $queue);
}
