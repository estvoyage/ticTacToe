<?php namespace estvoyage\ticTacToe\coordinate\place\generator;

use estvoyage\ticTacToe\{ coordinate\place, ninteger };

class fromOrigin
	implements
		place\generator
{
	private
		$factory
	;

	function __construct(place\factory\ninteger $factory)
	{
		$this->factory = $factory;
	}

	function recipientOfPlaceInTicTacToeBoardFromPlaceIs(place $place, place\recipient $recipient) :void
	{
		$place
			->recipientOfNIntegerGreaterThanZeroIs(
				new ninteger\recipient\functor(
					function($place) use ($recipient)
					{
						(new place\origin)
							->recipientOfNIntegerGreaterThanZeroIs(
								new ninteger\recipient\functor(
									function($origin) use ($place, $recipient)
									{
										(new ninteger\generator\between($origin, $place))
											->recipientOfNIntegerIs(
												new ninteger\recipient\functor(
													function($ninteger) use ($recipient)
													{
														$this->factory
															->recipientOfPlaceInTicTacToeBoardBuildWithNIntegerIs(
																$ninteger,
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
}
