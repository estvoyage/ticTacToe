<?php namespace estvoyage\ticTacToe\nstring\comparison\unary\regex;

use estvoyage\ticTacToe\{ regex, condition, nstring };

class pcre
{
	private
		$regex
	;

	function __construct(regex\pcre $regex)
	{
		$this->regex = $regex;
	}

	function conditionForComparisonWithNStringIs(string $nstring, condition $condition) :void
	{
		$this->regex
			->recipientOfPcreRegexAsNstringIs(
				new nstring\recipient\functor(
					function($regex) use ($nstring, $condition)
					{
						$condition
							->nbooleanIs(preg_match($regex, $nstring))
						;
					}
				)
			)
		;
	}
}
