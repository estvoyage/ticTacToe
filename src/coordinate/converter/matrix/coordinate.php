<?php namespace estvoyage\ticTacToe\coordinate\converter\matrix;

use estvoyage\{ ticTacToe, ticTacToe\matrix, ticTacToe\ninteger };

class coordinate
{
	private
		$template,
		$recipient
	;

	function __construct(matrix\coordinate $template, matrix\coordinate\recipient $recipient)
	{
		$this->template = $template;
		$this->recipient = $recipient;
	}

	function ticTacToeCoordinateIs(ticTacToe\coordinate $coordinate)
	{
		$coordinate
			->recipientOfPlaceInTicTacToeBoardRowsIs(
				new ticTacToe\coordinate\place\recipient\functor(
					function($row) use ($coordinate)
					{
						$coordinate
							->recipientOfPlaceInTicTacToeBoardColumnsIs(
								new ticTacToe\coordinate\place\recipient\functor(
									function($column) use ($row)
									{
										$row
											->recipientOfNIntegerGreaterThanZeroIs(
												new ninteger\recipient\functor(
													function($row) use ($column)
													{
														$column
															->recipientOfNIntegerGreaterThanZeroIs(
																new ninteger\recipient\functor(
																	function($column) use ($row)
																	{
																		$this->template
																			->recipientOfMatrixCoordinateWithRowAndColumnIs(
																				new matrix\coordinate\place\any($row),
																				new matrix\coordinate\place\any($column),
																				$this->recipient
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
				)
			)
		;
	}
}
