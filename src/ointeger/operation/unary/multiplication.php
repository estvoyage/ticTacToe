<?php namespace estvoyage\ticTacToe\ointeger\operation\unary;

use estvoyage\ticTacToe\{ ointeger, ninteger, block };

class multiplication
	implements
		ointeger\operation\unary
{
	private
		$template,
		$ointeger,
		$overflow
	;

	function __construct(ointeger $template, ointeger $ointeger, block $overflow = null)
	{
		$this->template = $template;
		$this->ointeger = $ointeger;
		$this->overflow = $overflow ?: new block\blackhole;
	}

	function recipientOfOperationWithOIntegerIs(ointeger $ointeger, ointeger\recipient $recipient) :void
	{
		$this->ointeger
			->recipientOfValueOfOIntegerIs(
				new ninteger\recipient\functor(
					function($ointeger1Value) use ($ointeger, $recipient) {
						$ointeger
							->recipientOfValueOfOIntegerIs(
								new ninteger\recipient\functor(
									function ($ointeger2Value) use ($ointeger1Value, $recipient) {
										(new ninteger\operation\unary\multiplication($ointeger1Value, $this->overflow))
											->recipientOfOperationWithNIntegerIs(
												$ointeger2Value,
												new ninteger\recipient\functor(
													function($operation) use ($recipient) {
														$this->template
															->recipientOfOIntegerWithValueIs(
																$operation,
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
				)
			)
		;
	}
}
