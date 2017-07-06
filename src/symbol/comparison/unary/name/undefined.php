<?php namespace estvoyage\ticTacToe\symbol\comparison\unary\name;

use estvoyage\ticTacToe\{ symbol, condition };

class undefined
{
	function recipientOfComparisonWithTicTacToeSymbolIs(symbol $symbol, condition $condition) :void
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

		$condition->nbooleanIs($boolean);
	}
}
