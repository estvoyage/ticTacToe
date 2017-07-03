<?php namespace estvoyage\ticTacToe\symbol\comparison\unary\name;

use estvoyage\ticTacToe\{ symbol, nboolean };

class undefined
{
	function recipientOfComparisonWithTicTacToeSymbolIs(symbol $symbol, nboolean\recipient $recipient) :void
	{
		$boolean = true;

		$symbol
			->recipientOfTicTacToeSymbolNameIs(
				new symbol\name\recipient\functor\any(
					function() use (& $boolean) {
						$boolean = false;
					}
				)
			)
		;

		$recipient->nbooleanIs($boolean);
	}
}
