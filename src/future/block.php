<?php namespace estvoyage\ticTacToe\future;

use estvoyage\{ ticTacToe, ticTacToe\future, ticTacToe\condition };

class block
	implements
		ticTacToe\future
{
	private
		$noBinding,
		$block,
		$value
	;

	function __construct(ticTacToe\block $noBinding)
	{
		$this->noBinding = $noBinding;
	}

	function futureForBlockIs(ticTacToe\block $block, ticTacToe\block $future) :void
	{
		$self = clone $this;
		$self->block = $block;

		$block->blockArgumentsAre($self);

		(
			new condition\ifTrueElse(
				new ticTacToe\block\functor(
					function() use ($self, $future)
					{
						$future->blockArgumentsAre($self->value);
					}
				),
				$self->noBinding
			)
		)
			->nbooleanIs(is_null($self->block))
		;
	}

	function valueForFutureIs($value) :void
	{
		(
			new condition\ifTrue\functor(
				function() use ($value) {
					$this->block = null;
					$this->value = $value;
				}
			)
		)
			->nbooleanIs(! is_null($this->block))
		;
	}
}
