<?php namespace estvoyage\ticTacToe\queue;

use estvoyage\ticTacToe\queue;

interface recipient
{
	function queueIs(queue $queue) :void;
}
