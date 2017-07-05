<?php namespace estvoyage\ticTacToe\block;

use estvoyage\ticTacToe\block;

class proxy
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
		$this->block->blockArgumentsAre(... $arguments);
	}
}
