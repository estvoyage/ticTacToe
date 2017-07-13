<?php namespace estvoyage\ticTacToe\queue\recipient;

use estvoyage\ticTacToe\{ queue, block };

class functor extends block\functor
	implements
		queue\recipient
{
	function queueIs(queue $queue) :void
	{
		parent::blockArgumentsAre($queue);
	}
}
