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
				new coordinate\recipient\nintegers(
					new block\functor(
						function($row, $column) use ($board)
						{
							(new ninteger\generator\between(1, $row))
								->recipientOfNIntegerIs(
									new ninteger\recipient\functor(
										function($currentRow) use ($board, $row, $column)
										{
											$rowWithSymbols = [];

											(new ninteger\generator\between(1, $column))
												->recipientOfNIntegerIs(
													new ninteger\recipient\functor(
														function($currentColumn) use ($board, $column, $currentRow, & $rowWithSymbols)
														{
															$rowWithSymbols[$currentColumn] = (($currentRow - 1) * $column) + $currentColumn;

															$board
																->recipientOfTicTacToeSymbolAtCoordinateIs(
																	new coordinate\any(new coordinate\place\any($currentRow), new coordinate\place\any($currentColumn)),
																	new symbol\recipient\functor(
																		function($symbol) use ($currentColumn, & $rowWithSymbols)
																		{
																			$symbol
																				->recipientOfTicTacToeSymbolNameIs(
																					new symbol\name\recipient\functor(
																						function() use ($currentColumn, & $rowWithSymbols) {
																							$rowWithSymbols[$currentColumn] = 'X';
																						},
																						function() use ($currentColumn, & $rowWithSymbols) {
																							$rowWithSymbols[$currentColumn] = 'O';
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

											$this->output->newLineForOutputIs(new ostring\any(join('|', $rowWithSymbols)));

											(
												new condition\ifTrue\functor(
													function() use ($column)
													{
														$this->output->newLineForOutputIs(new ostring\any(join('+', array_fill(1, $column, '-'))));
													}
												)
											)
												->nbooleanIs($currentRow < $row)
											;
										}
									)
								)
							;
						}
					)
				)
			)
		;
	}
}
