<?php namespace estvoyage\ticTacToe\board\view;

use estvoyage\{ ticTacToe, ticTacToe\board, ticTacToe\coordinate, ticTacToe\ostring, ticTacToe\block, ticTacToe\condition };

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
					function($maxCoordinate)
					{
						(
							new coordinate\recipient\nintegers(
								new block\functor(
									function($row, $column)
									{
										for ($currentRow = 1; $currentRow <= $row; $currentRow++)
										{
											$this->output->newLineForOutputIs(new ostring\any(join('|', array_fill(1, $column, ' '))));

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
							->coordinateInTicTacToeBoardIs($maxCoordinate)
						;
					}
				)
			)
		;
	}
}
