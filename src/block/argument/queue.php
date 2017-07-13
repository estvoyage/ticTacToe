<?php namespace estvoyage\ticTacToe\block\argument;

use estvoyage\{ ticTacToe, ticTacToe\block };

class queue
	implements
		block\argument
{
	private
		$queue
	;

	function __construct(ticTacToe\queue $queue)
	{
		$this->queue = $queue;
	}

	function blockIs(block $block) :void
	{
		$this->queue->blockIs($block);
	}

	function recipientOfBlockArgumentWithValueIs($value, block\argument\recipient $recipient) :void
	{
		$this->queue
			->recipientOfQueueWithValueIs(
				$value,
				new ticTacToe\queue\recipient\functor(
					function($queue) use ($recipient)
					{
						$argument = clone $this;
						$argument->queue = $queue;

						$recipient->argumentForBlockIs($argument);
					}
				)
			)
		;
	}
}
