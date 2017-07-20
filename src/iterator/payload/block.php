<?php namespace estvoyage\ticTacToe\iterator\payload;

use estvoyage\{ ticTacToe, ticTacToe\iterator };

class block
	implements
		iterator\payload
{
	private
		$block
	;

	function __construct(ticTacToe\block $block)
	{
		$this->block = $block;
	}

	function currentValueOfIteratorIs(iterator $iterator, $value) :void
	{
		$this->block->blockArgumentsAre($iterator, $value);
	}
}
