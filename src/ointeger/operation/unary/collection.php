<?php namespace estvoyage\ticTacToe\ointeger\operation\unary;

use estvoyage\ticTacToe\ointeger;

class collection
	implements
		ointeger\operation\unary
{
	private
		$operations
	;

	function __construct(ointeger\operation\unary... $operations)
	{
		$this->operations = $operations;
	}

	function recipientOfOperationWithOIntegerIs(ointeger $ointeger, ointeger\recipient $recipient) :void
	{
		foreach ($this->operations as $operation)
		{
			$result = null;

			$operation
				->recipientOfOperationWithOIntegerIs(
					$ointeger,
					new ointeger\recipient\functor(
						function($anOInteger) use (& $result, & $ointeger)
						{
							$ointeger = $result = $anOInteger;
						}
					)
				)
			;

			if ($result === null)
			{
				break;
			}
		}

		if ($result)
		{
			$recipient->ointegerIs($result);
		}
	}
}
