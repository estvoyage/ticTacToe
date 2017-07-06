<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\{ ticTacToe, ticTacToe\condition };

class block
	implements
		condition
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

	function recipientOfConditionWithArgumentsIs(array $arguments, recipient $recipient) :void
	{
		$recipient->conditionIs($this);
	}
}
