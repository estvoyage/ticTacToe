<?php namespace estvoyage\ticTacToe\ostring\operation\unary;

use estvoyage\ticTacToe\{ ostring, nstring };

class addition
{
	private
		$ostring,
		$factory
	;

	function __construct(ostring $ostring, ostring\factory\nstring $factory)
	{
		$this->ostring = $ostring;
		$this->factory = $factory;
	}

	function recipientOfOperationWithOStringIs(ostring $operand, ostring\recipient $recipient) :void
	{
		$operand
			->recipientOfNStringIs(
				new nstring\recipient\functor(
					function($nstringOfOperand) use ($recipient)
					{
						$this->ostring
							->recipientOfNStringIs(
								new nstring\recipient\functor(
									function($nstringOfOString) use ($nstringOfOperand, $recipient)
									{
										$this->factory
											->recipientOfOStringWithNStringIs(
												$nstringOfOString . $nstringOfOperand,
												$recipient
											)
										;
									}
								)
							)
						;
					}
				)
			)
		;
	}
}
