<?php namespace estvoyage\ticTacToe;

class future
{
	private
		$blockForValue,
		$blockIfNoBinding,
		$valueHandler
	;

	function __construct(block $blockForValue, block $blockIfNoBinding)
	{
		$this->blockForValue = $blockForValue;
		$this->blockIfNoBinding = $blockIfNoBinding;
		$this->valueHandler = new block\blackhole;
	}

	function blockIs(block $block) :void
	{
		$future = clone $this;
		$future->valueHandler = new block\functor(
			function($value) use ($future)
			{
				$future->blockIfNoBinding = new block\blackhole;

				$future->blockForValue->blockArgumentsAre($value);
			}
		);

		$block->blockArgumentsAre($future);

		$future->blockIfNoBinding->blockArgumentsAre();
	}

	function valueIs($value)
	{
		$this->valueHandler->blockArgumentsAre($value);
	}
}
