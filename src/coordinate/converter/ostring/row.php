<?php namespace estvoyage\ticTacToe\coordinate\converter\ostring;

use estvoyage\ticTacToe\{ coordinate, ostring, condition };

class row
{
	private
		$recipient,
		$symbol,
		$separator
	;

	function __construct(ostring\recipient $recipient, ostring $symbol, ostring $separator)
	{
		$this->recipient = $recipient;
		$this->symbol = $symbol;
		$this->separator = $separator;
	}

	function coordinateInTicTacToeBoardIs(coordinate $coordinate) :void
	{
		$ostring = new ostring\any('');

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
				$coordinate,
				new coordinate\recipient\functor(
					function($coordinateInRow) use ($coordinate, & $ostring)
					{
						(new ostring\operation\unary\addition($this->symbol, new ostring\factory\nstring\any))
							->recipientOfOperationWithOStringIs(
								$ostring,
								new ostring\recipient\functor(
									function($ostringWithSymbol) use ($coordinate, & $ostring, $coordinateInRow)
									{
										$ostring = $ostringWithSymbol;

										(new coordinate\comparison\unary\equal\not($coordinate))
											->conditionForComparisonWithTicTacToeCoordinateIs(
												$coordinateInRow,
												new condition\ifTrue\functor(
													function() use (& $ostring)
													{
														(new ostring\operation\unary\addition($this->separator, new ostring\factory\nstring\any))
															->recipientOfOperationWithOStringIs(
																$ostring,
																new ostring\recipient\functor(
																	function($ostringWithSeparator) use (& $ostring)
																	{
																		$ostring = $ostringWithSeparator;
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

		$this->recipient->ostringIs($ostring);
	}
}
