<?php namespace estvoyage\ticTacToe\iterator;

use estvoyage\ticTacToe\iterator;

class fifo
	implements
		iterator
{
	private
		$running,
		$stop
	;

	function valuesForIteratorPayloadAre(payload $payload, array $values) :void
	{
		$self = clone $this;
		$self->running = true;
		$self->stop = null;

		foreach (\SplFixedArray::fromArray($values) as $value)
		{
			$payload->currentValueOfIteratorIs($self, $value);

			if ($self->stop)
			{
				break;
			}
		}
	}

	function nextValuesAreUselessForIteratorPayload() :void
	{
		if ($this->running)
		{
			$this->stop = true;
		}
	}
}
