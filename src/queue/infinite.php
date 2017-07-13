<?php namespace estvoyage\ticTacToe\queue;

use estvoyage\ticTacToe\{ queue, condition, block };

class infinite
	implements
		queue
{
	private
		$values
	;

	function __construct(... $values)
	{
		$this->values = $values;
	}

	function recipientOfQueueWithValueIs($value, queue\recipient $recipient) :void
	{
		$queue = clone $this;
		$queue->values[] = $value;

		$recipient->queueIs($queue);
	}

	function recipientOfValueInQueueIs(queue\value\recipient $recipient) :void
	{
		(
			new condition\ifTrue\functor(
				function() use ($recipient)
				{
					$queue = clone $this;
					$value = array_shift($queue->values);

					$recipient->queueWithoutValueIs($value, $queue);
				}
			)
		)
			->nbooleanIs(sizeof($this->values) > 0)
		;
	}

	function blockIs(block $block) :void
	{
		$block->blockArgumentsAre(... $this->values);
	}
}
