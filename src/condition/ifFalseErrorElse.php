<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\{ condition, block };

class ifFalseErrorElse
	implements
		condition
{
	private
		$error,
		$else
	;

	function __construct(\error $error, block $else)
	{
		$this->error = $error;
		$this->else = $else;
	}

	function nbooleanIs(bool $boolean) :void
	{
		(
			new condition\ifTrueElse(
				new block\functor(
					function() {
						throw $this->error;
					}
				),
				$this->else
			)
		)
			->nbooleanIs(! $boolean)
		;
	}
}
