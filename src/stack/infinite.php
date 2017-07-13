<?php namespace estvoyage\ticTacToe\stack;

use estvoyage\ticTacToe\{ stack, condition, block };

class infinite
	implements
		stack
{
	private
		$values
	;

	function __construct(... $values)
	{
		$this->values = $values;
	}

	function recipientOfStackWithValueIs($value, stack\recipient $recipient) :void
	{
		$stack = clone $this;
		$stack->values[] = $value;

		$recipient->stackIs($stack);
	}

	function recipientOfValueInStackIs(stack\value\recipient $recipient) :void
	{
		(
			new condition\ifTrue\functor(
				function() use ($recipient)
				{
					$stack = clone $this;
					$value = array_pop($stack->values);

					$recipient->stackWithoutValueIs($value, $stack);
				}
			)
		)
			->nbooleanIs(sizeof($this->values) > 0)
		;
	}

	function blockIs(block $block) :void
	{
		$block->blockArgumentsAre(... array_reverse($this->values));
	}
}
