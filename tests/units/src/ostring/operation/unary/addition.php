<?php namespace estvoyage\ticTacToe\tests\units\ostring\operation\unary;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class addition extends units\test
{
	function testRecipientOfOperationWithOStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($ostring1 = new mockOfTicTacToe\ostring, $factory = new mockOfTicTacToe\ostring\factory\nstring),
				$ostring2 = new mockOfTicTacToe\ostring,
				$recipient = new mockOfTicTacToe\ostring\recipient
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOStringIs(
					$ostring2,
					$recipient
				)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ostring1, $factory))
				->mock($factory)
					->receive('recipientOfOStringWithNStringIs')
						->never


			->given(
				$nstringOfOString1 = uniqid(),
				$this->calling($ostring1)->recipientOfNStringIs = function($recipient) use ($nstringOfOString1) {
					$recipient->nstringIs($nstringOfOString1);
				},

				$nstringOfOString2 = uniqid(),
				$this->calling($ostring2)->recipientOfNStringIs = function($recipient) use ($nstringOfOString2) {
					$recipient->nstringIs($nstringOfOString2);
				}
			)
			->if(
				$this->testedInstance->recipientOfOperationWithOStringIs(
					$ostring2,
					$recipient
				)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($ostring1, $factory))
				->mock($factory)
					->receive('recipientOfOStringWithNStringIs')
						->withArguments($nstringOfOString1 . $nstringOfOString2, $recipient)
							->once
		;
	}
}
