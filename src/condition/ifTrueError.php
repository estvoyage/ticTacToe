<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\{ condition, block };

class ifTrueError
	implements
		condition
{
	private
		$error
	;

	function __construct(\error $error)
	{
		$this->error = $error;
	}

	function nbooleanIs(bool $boolean) :void
	{
		(
			new condition\ifTrue(
				new block\functor(
					function() {
						throw $this->error;
					}
				)
			)
		)
			->nbooleanIs($boolean)
		;
	}

	function recipientOfConditionWithArgumentsIs(array $arguments, recipient $recipient) :void
	{
		$recipient->conditionIs($this);
	}
}
