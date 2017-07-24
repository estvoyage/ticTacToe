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
				new matrix\coordinate\place\any(3),
				new matrix\coordinate\place\any(3)
			),
			new matrix\value\container\fifo(
				new matrix\value\any($l1c1, new matrix\coordinate\any(new matrix\coordinate\place\any(1), new matrix\coordinate\place\any(1))),
				new matrix\value\any($l1c2, new matrix\coordinate\any(new matrix\coordinate\place\any(1), new matrix\coordinate\place\any(2))),
				new matrix\value\any($l1c3, new matrix\coordinate\any(new matrix\coordinate\place\any(1), new matrix\coordinate\place\any(3))),

				new matrix\value\any($l2c1, new matrix\coordinate\any(new matrix\coordinate\place\any(2), new matrix\coordinate\place\any(1))),
				new matrix\value\any($l2c2, new matrix\coordinate\any(new matrix\coordinate\place\any(2), new matrix\coordinate\place\any(2))),
				new matrix\value\any($l2c3, new matrix\coordinate\any(new matrix\coordinate\place\any(2), new matrix\coordinate\place\any(3))),

				new matrix\value\any($l3c1, new matrix\coordinate\any(new matrix\coordinate\place\any(3), new matrix\coordinate\place\any(1))),
				new matrix\value\any($l3c2, new matrix\coordinate\any(new matrix\coordinate\place\any(3), new matrix\coordinate\place\any(2))),
				new matrix\value\any($l3c3, new matrix\coordinate\any(new matrix\coordinate\place\any(3), new matrix\coordinate\place\any(3)))
			)
		);
	}

	function recipientOfTicTacToeSymbolAtCoordinateIs(coordinate $coordinate, symbol\recipient $recipient) :void
	{
		$this
			->recipientOfMatrixCoordinateForTicTacToeCoordinateIs(
				$coordinate,
				new matrix\coordinate\recipient\functor(
					function($coordinate) use ($recipient)
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
				)
			)
		;
	}

	function recipientOfTicTacToeBoardWithSymbolAtCoordinateIs(symbol $symbol, coordinate $coordinate, board\recipient $recipient) :void
	{
		$this
			->recipientOfMatrixCoordinateForTicTacToeCoordinateIs(
				$coordinate,
				new matrix\coordinate\recipient\functor(
					function($matrixCoordinate) use ($symbol, $coordinate, $recipient)
					{
						(
							new matrix\value\recipient\future\block(
								new block\functor(
									function() use ($symbol, $matrixCoordinate, $recipient)
									{
										$this
											->recipientForBoardWithSymbolAtCoordinateIs(
												$symbol,
												$matrixCoordinate,
												$recipient
											)
										;
									}
								)
							)
						)
							->futureForblockIs(
								new block\functor(
									function($symbolRecipient) use ($matrixCoordinate)
									{
										$this->symbols
											->recipientOfValueInMatrixAtCoordinateIs(
												$matrixCoordinate,
												$symbolRecipient
											)
										;
									}
								),
								new block\functor(
									function($symbolInMatrix) use ($symbol, $matrixCoordinate, $recipient)
									{
										(new symbol\comparison\unary\name\undefined)
											->recipientOfComparisonWithTicTacToeSymbolIs(
												$symbolInMatrix,
												new condition\ifTrue\functor(
													function() use ($symbol, $matrixCoordinate, $recipient)
													{
														$this
															->recipientForBoardWithSymbolAtCoordinateIs(
																$symbol,
																$matrixCoordinate,
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

	private function recipientForBoardWithSymbolAtCoordinateIs(symbol $symbol, matrix\coordinate $coordinate, board\recipient $recipient) :void
	{
		$this->symbols
			->recipientOfMatrixWithValueAtCoordinateIs(
				$symbol,
				$coordinate,
				new matrix\recipient\functor(
					function($symbols) use ($recipient)
					{
						$self = clone $this;
						$self->symbols = $symbols;

						$recipient->ticTacToeBoardIs($self);
					}
				)
			)
		;
	}

	private function recipientOfMatrixCoordinateForTicTacToeCoordinateIs(coordinate $coordinate, matrix\coordinate\recipient $recipient) :void
	{
		(
			new coordinate\converter\matrix\coordinate(
				new matrix\coordinate\any(new matrix\coordinate\place\any(1), new matrix\coordinate\place\any(1)),
				$recipient
			)
		)
			->ticTacToeCoordinateIs($coordinate)
		;
	}
}
