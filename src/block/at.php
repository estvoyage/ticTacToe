<?php namespace estvoyage\ticTacToe\block;

use estvoyage\ticTacToe\block;

class at
	implements
		block
{
	private
		$block
	;

	function __construct(block $block)
	{
		$this->block = $block;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		$previousErrorHandler = set_error_handler(function() {});

		$this->block->blockArgumentsAre(... $arguments);

		set_error_handler($previousErrorHandler);
	}
}
