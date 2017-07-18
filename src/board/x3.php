<?php namespace estvoyage\ticTacToe\board;

use estvoyage\ticTacToe\{ board, symbol, coordinate, ninteger, block, condition, matrix, ointeger, future };

class x3
	implements
		board
{
	private
		$symbols
	;

	function __construct(
		symbol $l1c1, symbol $l1c2, symbol $l1c3,
		symbol $l2c1, symbol $l2c2, symbol $l2c3,
		symbol $l3c1, symbol $l3c2, symbol $l3c3
	)
	{
		$this->symbols = new matrix\any(
			new matrix\coordinate\any(
				new matrix\coordinate\distance\any(3),
				new matrix\coordinate\distance\any(3)
			),
			new matrix\value\any($l1c1, new matrix\coordinate\any(new matrix\coordinate\distance\any(1), new matrix\coordinate\distance\any(1))),
			new matrix\value\any($l1c2, new matrix\coordinate\any(new matrix\coordinate\distance\any(1), new matrix\coordinate\distance\any(2))),
			new matrix\value\any($l1c3, new matrix\coordinate\any(new matrix\coordinate\distance\any(1), new matrix\coordinate\distance\any(3))),

			new matrix\value\any($l2c1, new matrix\coordinate\any(new matrix\coordinate\distance\any(2), new matrix\coordinate\distance\any(1))),
			new matrix\value\any($l2c2, new matrix\coordinate\any(new matrix\coordinate\distance\any(2), new matrix\coordinate\distance\any(2))),
			new matrix\value\any($l2c3, new matrix\coordinate\any(new matrix\coordinate\distance\any(2), new matrix\coordinate\distance\any(3))),

			new matrix\value\any($l3c1, new matrix\coordinate\any(new matrix\coordinate\distance\any(3), new matrix\coordinate\distance\any(1))),
			new matrix\value\any($l3c2, new matrix\coordinate\any(new matrix\coordinate\distance\any(3), new matrix\coordinate\distance\any(2))),
			new matrix\value\any($l3c3, new matrix\coordinate\any(new matrix\coordinate\distance\any(3), new matrix\coordinate\distance\any(3)))
		);
	}

	function recipientOfTicTacToeSymbolAtCoordinateIs(coordinate $coordinate, symbol\recipient $recipient) :void
	{
		$this->symbols
			->recipientOfValueInMatrixAtCoordinateIs(
				$coordinate,
				new matrix\value\recipient\functor(
					function($symbol) use ($recipient)
					{
						$recipient->ticTacToeSymbolIs($symbol);
					}
				)
			)
		;
	}

	function recipientOfTicTacToeBoardWithSymbolAtCoordinateIs(symbol $symbol, coordinate $coordinate, board\recipient $recipient) :void
	{
		(
			new matrix\value\recipient\future\block(
				new block\functor(
					function() use ($symbol, $coordinate, $recipient)
					{
						$this
							->recipientForBoardWithSymbolAtCoordinateIs(
								$symbol,
								$coordinate,
								$recipient
							)
						;
					}
				)
			)
		)
			->futureForblockIs(
				new block\functor(
					function($symbolRecipient) use ($coordinate)
					{
						$this->symbols
							->recipientOfValueInMatrixAtCoordinateIs(
								$coordinate,
								$symbolRecipient
							)
						;
					}
				),
				new block\functor(
					function($symbolInMatrix) use ($symbol, $coordinate, $recipient)
					{
						(new symbol\comparison\unary\name\undefined)
							->recipientOfComparisonWithTicTacToeSymbolIs(
								$symbolInMatrix,
								new condition\ifTrue\functor(
									function() use ($symbol, $coordinate, $recipient)
									{
										$this
											->recipientForBoardWithSymbolAtCoordinateIs(
												$symbol,
												$coordinate,
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

	private function recipientForBoardWithSymbolAtCoordinateIs(symbol $symbol, coordinate $coordinate, board\recipient $recipient) :void
	{
		$this->symbols
			->recipientOfMatrixWithValueAtCoordinateIs(
				$symbol,
				$coordinate,
				new matrix\recipient\functor(
					function($symbols) use ($recipient)
					{
						$board = clone $this;
						$board->symbols = $symbols;

						$recipient->ticTacToeBoardIs($board);
					}
				)
			)
		;
	}
}
