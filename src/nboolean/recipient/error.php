<?php namespace estvoyage\ticTacToe\nboolean\recipient;

use estvoyage\ticTacToe\{ nboolean, block };

class error
	implements
		nboolean\recipient
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
			new nboolean\recipient\ifTrue(
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
}
