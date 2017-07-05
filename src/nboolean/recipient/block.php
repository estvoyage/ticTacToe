<?php namespace estvoyage\ticTacToe\nboolean\recipient;

use estvoyage\{ ticTacToe, ticTacToe\nboolean };

class block
	implements
		nboolean\recipient
{
	private
		$block
	;

	function __construct(ticTacToe\block $block)
	{
		$this->block = $block;
	}

	function nbooleanIs(bool $boolean) :void
	{
		$this->block
			->blockArgumentsAre($boolean)
		;
	}
}
