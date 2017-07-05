<?php namespace estvoyage\ticTacToe\board;

use estvoyage\ticTacToe\{ board, symbol, coordinate, ninteger, block, nboolean };

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
		self::overflowForRecipientOfKeyFromCoordinateIs(
			$coordinate,
			new ninteger\comparison\unary\recipient\ifTrue(
				function($key) use ($recipient)
				{
					$recipient->ticTacToeSymbolIs($this->symbols[$key]);
				}
			),
			new block\blackhole
		);
	}

	function recipientOfTicTacToeBoardWithSymbolAtCoordinateIs(symbol $symbol, coordinate $coordinate, board\recipient $recipient) :void
	{
		self::overflowForRecipientOfKeyFromCoordinateIs(
			$coordinate,
			new ninteger\comparison\unary\recipient\ifFalseElse(
				new block\functor(
					function() use ($recipient, $coordinate, $symbol)
					{
						$recipient->invalidCoordinateForTicTacToeSymbol($coordinate, $symbol);
					}
				),
				new block\functor(
					function($key) use ($recipient, $coordinate, $symbol)
					{
						(new symbol\comparison\unary\name\undefined)
							->recipientOfComparisonWithTicTacToeSymbolIs(
								$this->symbols[$key],
								new nboolean\recipient\ifTrueElse(
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
				)
			),
			new block\functor(
				function() use ($recipient, $coordinate, $symbol)
				{
					$recipient->invalidCoordinateForTicTacToeSymbol($coordinate, $symbol);
				}
			)
		);
	}

	private static function overflowForRecipientOfKeyFromCoordinateIs(coordinate $coordinate, ninteger\comparison\unary\recipient $recipient, block $overflow) :void
	{
		$coordinate
			->recipientOfLineAndColumnIs(
				new coordinate\recipient\functor(
					function($line, $column) use ($recipient, $overflow)
					{
						(
							new ninteger\operation\unary\collection(
								new ninteger\operation\unary\multiplication(3, $overflow),
								new ninteger\operation\unary\addition($column, $overflow)
							)
						)
							->recipientOfOperationWithNIntegerIs(
								$line,
								new ninteger\recipient\comparison\unary(
									new ninteger\comparison\unary\between(0, 8),
									$recipient
								)
							)
						;
					}
				)
			)
		;
	}
}
