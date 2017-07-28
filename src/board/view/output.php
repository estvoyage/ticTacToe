<?php namespace estvoyage\ticTacToe\board\view;

use estvoyage\{ ticTacToe, ticTacToe\board, ticTacToe\coordinate, ticTacToe\ostring, ticTacToe\block, ticTacToe\condition, ticTacToe\symbol, ticTacToe\ninteger };

class output
{
	private
		$output
	;

	function __construct(ticTacToe\output $output)
	{
		$this->output = $output;
	}

	function ticTacToeBoardIs(board $board) :void
	{
		$board
			->recipientOfMaximumCoordinateOfTicTacToeBoardIs(
				new coordinate\recipient\functor(
					function($maximumCoordinate) use ($board)
					{
						$index = 1;

						(
							new coordinate\generator\any(
								new coordinate\factory\places\any,
								new coordinate\place\generator\fromOrigin(
									new coordinate\place\factory\ninteger\any
								),
								new coordinate\place\generator\same
							)
						)
							->recipientOfTicTacToeCoordinateFromCoordinateIs(
								$maximumCoordinate,
								new coordinate\recipient\functor(
									function($maximumCoordinateInRow) use (& $index, $maximumCoordinate, $board)
									{
										$row = [];

										(
											new coordinate\generator\any(
												new coordinate\factory\places\any,
												new coordinate\place\generator\same,
												new coordinate\place\generator\fromOrigin(
													new coordinate\place\factory\ninteger\any
												)
											)
										)
											->recipientOfTicTacToeCoordinateFromCoordinateIs(
												$maximumCoordinateInRow,
												new coordinate\recipient\functor(
													function($symbolCoordinate) use (& $index, & $row, $board)
													{
														$output = $index++;

														$board
															->recipientOfTicTacToeSymbolAtCoordinateIs(
																$symbolCoordinate,
																new symbol\recipient\functor(
																	function($symbol) use (& $output)
																	{
																		$symbol
																			->recipientOfTicTacToeSymbolNameIs(
																				new symbol\name\recipient\functor(
																					function() use (& $output) {
																						$output = 'X';
																					},
																					function() use (& $output) {
																						$output = 'O';
																					}
																				)
																			)
																		;
																	}
																)
															)
														;

														$row[] = $output;

													}
												)
											)
										;

										$this->output->newLineForOutputIs(new ostring\any(join('|', $row)));

										(new coordinate\comparison\unary\equal\not($maximumCoordinate))
											->conditionForComparisonWithTicTacToeCoordinateIs(
												$maximumCoordinateInRow,
												new condition\ifTrue\functor(
													function() use ($maximumCoordinateInRow)
													{
														(
															new coordinate\converter\ostring\row(
																new ostring\recipient\functor(
																	function($ostring)
																	{
																		$this->output->newLineForOutputIs($ostring);
																	}
																),
																new ostring\any('-'),
																new ostring\any('+')
															)
														)
															->coordinateInTicTacToeBoardIs(
																$maximumCoordinateInRow
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
}
