<?php namespace estvoyage\ticTacToe\ninteger\operation\unary;

use estvoyage\ticTacToe\ninteger;

class collection
	implements
		ninteger\operation\unary
{
	private
		$operations,
		$ninteger
	;

	function __construct(ninteger\operation\unary... $operations)
	{
		$this->operations = $operations;
	}

	function recipientOfOperationWithNIntegerIs(int $ninteger, ninteger\recipient $recipient) :void
	{
		$break = true;
		$recipient = new ninteger\recipient\switcher(
			sizeof($this->operations),
			new ninteger\recipient\functor(
				function($aNInteger) use (& $ninteger, & $break) {
					$break = false;
					$ninteger = $aNInteger;
				}
			),
			$recipient
		);

		foreach ($this->operations as $operation)
		{
			$operation
				->recipientOfOperationWithNIntegerIs(
					$ninteger,
					$recipient
				)
			;

			if ($break)
			{
				break;
			}

			$break = true;
		}
	}
}
