<?php namespace estvoyage\ticTacToe\coordinate\generator;

use estvoyage\ticTacToe\{ coordinate, block };

class any
{
	private
		$factory,
		$rowGenerator,
		$columnGenerator
	;

	function __construct(coordinate\factory\places $factory, coordinate\place\generator $rowGenerator, coordinate\place\generator $columnGenerator)
	{
		$this->factory = $factory;
		$this->rowGenerator = $rowGenerator;
		$this->columnGenerator = $columnGenerator;
	}

	function recipientOfTicTacToeCoordinateFromCoordinateIs(coordinate $coordinate, coordinate\recipient $recipient) :void
	{
		$coordinate
			->recipientOfPlaceInTicTacToeBoardRowsIs(
				new coordinate\place\recipient\functor(
					function($row) use ($coordinate, $recipient)
					{
						$coordinate
							->recipientOfPlaceInTicTacToeBoardColumnsIs(
								new coordinate\place\recipient\functor(
									function($column) use ($row, $recipient)
									{
										$this->rowGenerator
											->recipientOfPlaceInTicTacToeBoardFromPlaceIs(
												$row,
												new coordinate\place\recipient\functor(
													function($row) use ($column, $recipient)
													{
														$this->columnGenerator
															->recipientOfPlaceInTicTacToeBoardFromPlaceIs(
																$column,
																new coordinate\place\recipient\functor(
																	function($column) use ($row, $recipient)
																	{
																		$this->factory
																			->recipientOfTicTacToeCoordinateWithRowAndColumnIs(
																				$row,
																				$column,
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
				)
			)
		;
	}
}
