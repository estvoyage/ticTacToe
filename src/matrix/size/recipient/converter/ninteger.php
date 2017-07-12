<?php namespace estvoyage\ticTacToe\matrix\size\recipient\converter;

use estvoyage\{ ticTacToe, ticTacToe\matrix };

class ninteger
	implements
		matrix\size\recipient
{
	private
		$recipient
	;

	function __construct(ticTacToe\ninteger\recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	function matrixSizeIs(matrix\size $size) :void
	{
		$size
			->recipientOfValueOfOIntegerIs(
				new ticTacToe\ninteger\recipient\functor(
					function($sizeValue)
					{
						$this->recipient->nintegerIs($sizeValue);
					}
				)
			)
		;
	}
}
