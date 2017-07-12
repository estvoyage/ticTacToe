<?php namespace estvoyage\ticTacToe\ointeger\unsigned;

use estvoyage\ticTacToe\{ condition, ointeger, block, ninteger };

class any extends ointeger\any
	implements
		ointeger\unsigned
{
	function __construct($value = 0)
	{
		try
		{
			parent::__construct($value);

			self::conditionForOIntegerIs(
				$this,
				new condition\ifTrueError(new \typeError)
			);
		}
		catch (\typeError $error)
		{
			throw new \typeError('Value should be an unsigned integer');
		}
	}

	function recipientOfOIntegerWithValueIs($value, ointeger\recipient $recipient) :void
	{
		parent::recipientOfOIntegerWithValueIs(
			$value,
			new ointeger\recipient\functor(
				function($ointeger) use ($recipient) {
					self::conditionForOIntegerIs(
						$ointeger,
						new condition\ifFalseFunctor(
							function() use ($ointeger, $recipient) {
								$recipient->ointegerIs($ointeger);
							}
						)
					);
				}
			)
		);
	}

	function recipientOfValueOfUnsignedOIntegerIs(ninteger\unsigned\recipient $recipient) :void
	{
		$this
			->recipientOfValueOfOIntegerIs(
				new ninteger\recipient\functor(
					function($ninteger) use ($recipient)
					{
						$recipient->unsignedNIntegerIs($ninteger);
					}
				)
			)
		;
	}

	private static function conditionForOIntegerIs(ointeger $ointeger, condition $condition) :void
	{
		(new ointeger\comparison\unary\lessThan(new ointeger\any))
			->recipientOfComparisonWithOIntegerIsCondition(
				$ointeger,
				$condition
			)
		;
	}
}
