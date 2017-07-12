<?php namespace estvoyage\ticTacToe\ointeger\operation\binary;

use estvoyage\ticTacToe\{ ointeger, ninteger };

class any
	implements
		ointeger\operation\binary
{
	private
		$template,
		$operation
	;

	function __construct(ointeger $template, ninteger\operation\binary $operation)
	{
		$this->template = $template;
		$this->operation = $operation;
	}

	function recipientOfOperationWithOIntegerAndOIntegerIs(ointeger $ointeger1, ointeger $ointeger2, ointeger\recipient $recipient) :void
	{
		$ointeger1
			->recipientOfValueOfOIntegerIs(
				new ninteger\recipient\functor(
					function($ointeger1Value) use ($ointeger2, $recipient) {
						$ointeger2
							->recipientOfValueOfOIntegerIs(
								new ninteger\recipient\functor(
									function($ointeger2Value) use ($ointeger1Value, $recipient) {
										$this->operation
											->recipientOfOperationWithNIntegerAndNIntegerIs(
												$ointeger1Value,
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
