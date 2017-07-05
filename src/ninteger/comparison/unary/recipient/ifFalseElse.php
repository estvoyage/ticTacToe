<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe\{ ninteger, nboolean, block };

class ifFalseElse extends nboolean\recipient\ifTrueElse
	implements
		ninteger\comparison\unary\recipient
{
	function __construct(block $false, block $true)
	{
		parent::__construct($true, $false);
	}

	function comparisonWithNIntegerIs(int $ninteger, bool $boolean) :void
	{
		$this
			->recipientOfNBooleanRecipientWithArgumentsIs(
				[ $ninteger ],
				new nboolean\recipient\recipient\functor(
					function($self) use ($boolean)
					{
						$self->nbooleanIs($boolean);
					}
				)
			)
		;
	}
}
