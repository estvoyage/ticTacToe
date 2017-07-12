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
		symbol $l0c0, symbol $l0c1, symbol $l0c2,
		symbol $l1c0, symbol $l1c1, symbol $l1c2,
		symbol $l2c0, symbol $l2c1, symbol $l2c2
	)
	{
		$this->symbols = new matrix\any(
			new matrix\dimension\square(
				new matrix\dimension\side\any(3)
			),
			$l0c0, $l0c1, $l0c2,
			$l1c0, $l1c1, $l1c2,
			$l2c0, $l2c1, $l2c2
		);
	}

	function recipientOfTicTacToeSymbolAtCoordinateIs(coordinate $coordinate, symbol\recipient $recipient) :void
	{
		$this->symbols
			->recipientOfMatrixValueAtCoordinateIs(
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
			new matrix\value\recipient\future\functor(
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
				},
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
			->blockIs(
				new block\functor(
					function($symbolRecipient) use ($coordinate)
					{
						$this->symbols
							->recipientOfMatrixValueAtCoordinateIs(
								$coordinate,
								$symbolRecipient
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
