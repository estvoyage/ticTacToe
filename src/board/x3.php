<?php namespace estvoyage\ticTacToe\board;

use estvoyage\ticTacToe\{ board, symbol, coordinate, ninteger, block, condition };

class x3
	implements
		board
{
	private
		$symbols
	;

	function __construct(
		symbol $l0c0, symbol $l0c1, symbol $l0c2,
		symbol $l1c0, symbol $l1c1, symbol $l1c2,
		symbol $l2c0, symbol $l2c1, symbol $l2c2
	)
	{
		$this->symbols = func_get_args();
	}

	function recipientOfTicTacToeSymbolAtCoordinateIs(coordinate $coordinate, symbol\recipient $recipient) :void
	{
		self::keyBlockAndInvalidBlockForCoordinateIs(
			$coordinate,
			new block\functor(
				function($key) use ($recipient)
				{
					$recipient->ticTacToeSymbolIs($this->symbols[$key]);
				}
			)
		);
	}

	function recipientOfTicTacToeBoardWithSymbolAtCoordinateIs(symbol $symbol, coordinate $coordinate, board\recipient $recipient) :void
	{
		self::keyBlockAndInvalidBlockForCoordinateIs(
			$coordinate,
			new block\functor(
				function($key) use ($recipient, $coordinate, $symbol)
				{
					(new symbol\comparison\unary\name\undefined)
						->recipientOfComparisonWithTicTacToeSymbolIs(
							$this->symbols[$key],
							new condition\ifTrueElse(
								new block\functor(
									function() use ($recipient, $symbol, $key)
									{
										$board = clone $this;
										$board->symbols[$key] = $symbol;

										$recipient->ticTacToeBoardIs($board);
									}
								),
								new block\functor(
									function() use ($recipient, $coordinate, $symbol)
									{
										$recipient->overlapCoordinateForTicTacToeSymbol($coordinate, $symbol);
									}
								)
							)
						)
					;
				}
			),
			new block\functor(
				function() use ($recipient, $coordinate, $symbol)
				{
					$recipient->invalidCoordinateForTicTacToeSymbol($coordinate, $symbol);
				}
			)
		);
	}

	private static function keyBlockAndInvalidBlockForCoordinateIs(coordinate $coordinate, block $keyBlock, block $invalidBlock = null)
	{
		$coordinate
			->recipientOfLineAndColumnIs(
				new coordinate\recipient\indexer(3, 3, $keyBlock, $invalidBlock)
			)
		;
	}
}
