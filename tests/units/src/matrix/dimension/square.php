<?php namespace estvoyage\ticTacToe\tests\units\matrix\dimension;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, matrix };
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class square extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\dimension')
		;
	}

	function testRecipientOfMatrixSizeIs()
	{
		$this
			->given(
				$this->newTestedInstance($side = new mockOfTicTacToe\matrix\dimension\side),

				$this->calling($side)->recipientOfValueOfOIntegerIs = function($recipient) {
					$recipient->nintegerIs(3);
				},

				$size = new mockOfTicTacToe\matrix\size,

				$template = new mockOfTicTacToe\matrix\size,
				$this->calling($template)->recipientOfOIntegerWithValueIs = function($value, $recipient) use ($size) {
					if ($value == 9)
					{
						$recipient->ointegerIs($size);
					}
				},

				$recipient = new mockOfTicTacToe\matrix\size\recipient
			)
			->if(
				$this->testedInstance->recipientOfMatrixSizeIs($template, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($side))
				->mock($recipient)
					->receive('matrixSizeIs')
						->withArguments($size)
							->once
		;
	}

	function testRecipientOfNumberOfRowsInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($side = new mockOfTicTacToe\matrix\dimension\side),
				$recipient = new mockOfTicTacToe\matrix\dimension\row\recipient
			)
			->if(
				$this->testedInstance->recipientOfNumberOfRowsInMatrixIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($side))
				->mock($recipient)
					->receive('numberOfRowsInMatrixIs')
						->withArguments($side)
							->once
		;
	}

	function testRecipientOfNumberOfColumnsInMatrixIs()
	{
		$this
			->given(
				$this->newTestedInstance($side = new mockOfTicTacToe\matrix\dimension\side),
				$recipient = new mockOfTicTacToe\matrix\dimension\column\recipient
			)
			->if(
				$this->testedInstance->recipientOfNumberOfColumnsInMatrixIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($side))
				->mock($recipient)
					->receive('numberOfColumnsInMatrixIs')
						->withArguments($side)
							->once
		;
	}

	protected function mValueAbscisseValueOrdinateValueAndIndexValueProvider()
	{
		return [
			[ 3, 0, 0, 0 ],
			[ 3, 0, 1, 1 ],
			[ 3, 0, 2, 2 ],
			[ 3, 1, 0, 3 ],
			[ 3, 1, 1, 4 ],
			[ 3, 1, 2, 5 ],
			[ 3, 2, 0, 6 ],
			[ 3, 2, 1, 7 ],
			[ 3, 2, 2, 8 ]
		];
	}
}
