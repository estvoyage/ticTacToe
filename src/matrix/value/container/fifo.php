<?php namespace estvoyage\ticTacToe\matrix\value\container;

use estvoyage\ticTacToe\{ matrix, iterator, condition };

class fifo
	implements
		matrix\value\container
{
	private
		$values
	;

	function __construct(matrix\value... $values)
	{
		$this->values = $values;
	}

	function payloadForIteratorIs(iterator $iterator, iterator\payload $payload) :void
	{
		(
			new condition\ifTrue\functor(
				function() use ($iterator, $payload)
				{
					$iterator->valuesForIteratorPayloadAre($payload, $this->values);
				}
			)
		)
			->nbooleanIs(sizeof($this->values))
		;
	}
}
