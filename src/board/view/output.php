<?php namespace estvoyage\ticTacToe\board\view;

use estvoyage\{ ticTacToe, ticTacToe\board, ticTacToe\coordinate, ticTacToe\ostring, ticTacToe\block, ticTacToe\condition, ticTacToe\symbol };

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
							for ($currentRow = 1; $currentRow <= $row; $currentRow++)
							{
								$rowWithSymbols = [];

								for ($currentColumn = 1; $currentColumn <= $column; $currentColumn++)
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
						}
					)
				)
			)
		;
	}
}
