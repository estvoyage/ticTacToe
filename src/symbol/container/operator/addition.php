<?php namespace estvoyage\ticTacToe\symbol\container\operator;

use estvoyage\ticTacToe\symbol;

class addition
	implements
		symbol\container\operator
{
	private
		$container
	;

	function __construct(symbol\container $container)
	{
		$this->container = $container;
	}

	function ticTacToeSymbolIs(symbol $symbol) :void
	{
		$this->container
			->recipientOfContainerWithTicTacToeSymbolIs(
				$symbol,
				new symbol\container\recipient\functor(
					function($container) {
						$this->container = $container;
					}
				)
			)
		;
	}

	function recipientOfTicTacToeSymbolContainerIs(symbol\container\recipient $recipient) :void
	{
		$recipient->ticTacToeSymbolContainerIs($this->container);
	}
}
