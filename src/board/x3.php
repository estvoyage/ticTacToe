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
		$coordinate
			->recipientOfLineAndColumnIs(
				new coordinate\recipient\functor(
					function($line, $column) use ($recipient)
					{
						self::blocksForLineAndColumnAre(
							$line,
							$column,
							new block\functor(
								function($key) use ($recipient)
								{
									$recipient->ticTacToeSymbolIs($this->symbols[$key]);
								}
							)
						);
					}
				)
			)
		;
	}

	function recipientOfTicTacToeBoardWithSymbolAtCoordinateIs(symbol $symbol, coordinate $coordinate, board\recipient $recipient) :void
	{
		$coordinate
			->recipientOfLineAndColumnIs(
				new coordinate\recipient\functor(
					function($line, $column) use ($symbol, $coordinate, $recipient)
					{
						self::blocksForLineAndColumnAre(
							$line,
							$column,
							new block\functor(
								function($key) use ($recipient, $coordinate, $symbol)
								{
									(new symbol\comparison\unary\name\undefined)
										->recipientOfComparisonWithTicTacToeSymbolIs(
											$this->symbols[$key],
											new nboolean\recipient\switcher(
												function() use ($recipient, $symbol, $key)
												{
													self::recipientOfBoardWithSymbolAtKeyIs(clone $this, $symbol, $key, $recipient);
												},
												function() use ($recipient, $coordinate, $symbol)
												{
													$recipient->overlapCoordinateForTicTacToeSymbol($coordinate, $symbol);
												}
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
				)
			)
		;
	}

	private static function blocksForLineAndColumnAre($line, $column, block $validKey, block $invalidKey = null)
	{
		(new ninteger\operation\unary\multiplication(3, $invalidKey))
			->recipientOfOperationWithNIntegerIs(
				$line,
				new ninteger\recipient\functor(
					function($line) use ($column, $validKey, $invalidKey)
					{
						(new ninteger\operation\unary\addition($column, $invalidKey))
							->recipientOfOperationWithNIntegerIs(
								$line,
								new ninteger\recipient\functor(
									function($key) use ($validKey, $invalidKey)
									{
										(new ninteger\comparison\unary\between(0, 8))
											->recipientOfComparisonWithNIntegerIs(
												$key,
												new nboolean\recipient\switcher(
													function() use ($key, $validKey)
													{
														$validKey->blockArgumentsAre($key);
													},
													function() use ($key, $invalidKey)
													{
														($invalidKey ?: new block\blackhole)->blockArgumentsAre();
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

	private static function recipientOfBoardWithSymbolAtKeyIs(self $board, symbol $symbol, int $key, board\recipient $recipient) :void
	{
		$board->symbols[$key] = $symbol;

		$recipient->ticTacToeBoardIs($board);
	}
}
