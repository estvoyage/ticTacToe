<?php namespace estvoyage\ticTacToe\future;

use estvoyage\{ ticTacToe, ticTacToe\future };

class block
	implements
		ticTacToe\future
{
	private
		$blockForValue,
		$blockIfNoBinding,
		$valueHandler
	;

	function __construct(ticTacToe\block $blockForValue, ticTacToe\block $blockIfNoBinding)
	{
		$this->blockForValue = $blockForValue;
		$this->blockIfNoBinding = $blockIfNoBinding;
		$this->valueHandler = new ticTacToe\block\blackhole;
	}

	function blockIs(ticTacToe\block $block) :void
	{
		$future = clone $this;
		$future->valueHandler = new ticTacToe\block\functor(
			function($value) use ($future)
			{
				$future->blockIfNoBinding = new ticTacToe\block\blackhole;

				$future->blockForValue->blockArgumentsAre($value);
			}
		);

		$block->blockArgumentsAre($future);

		$future->blockIfNoBinding->blockArgumentsAre();
	}

	function valueIs($value) :void
	{
		$this->valueHandler->blockArgumentsAre($value);
	}
}
