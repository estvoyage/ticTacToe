<?php namespace estvoyage\ticTacToe\tests\units\nboolean\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifTrueElse extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\nboolean\recipient\withArguments')
		;
	}

	function test__construct()
	{
		$this
			->given(
				$true = new mockOfTicTacToe\block,
				$false = new mockOfTicTacToe\block
			)
			->if(
				$this->newTestedInstance(
					$true,
					$false
				)
			)
			->then
				->object($this->testedInstance)->isEqualTo($this->newTestedInstance($true, $false, []))
		;
	}

	function testNbooleanIs()
	{
		$this
			->given(
				$arguments = [ '', uniqid(), null, true, false, rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, new \stdClass ],
				$this->newTestedInstance(
					$true = new mockOfTicTacToe\block,
					$false = new mockOfTicTacToe\block,
					$arguments
				)
			)
			->if(
				$this->testedInstance->nbooleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($true, $false, $arguments))
				->mock($true)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
				->mock($false)
					->receive('blockArgumentsAre')
						->never

			->if(
				$this->testedInstance->nbooleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($true, $false, $arguments))
				->mock($true)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
				->mock($false)
					->receive('blockArgumentsAre')
						->withArguments(... $arguments)
							->once
		;
	}

	function testRecipientOfNBooleanRecipientWithArgumentsIs()
	{
		$this
			->given(
				$recipient = new mockOfTicTacToe\nboolean\recipient\recipient,
				$arguments = [ '', uniqid(), null, true, false, rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, new \stdClass ],
				$this->newTestedInstance($true = new mockOfTicTacToe\block, $false = new mockOfTicTacToe\block, [])
			)
			->if(
				$this->testedInstance->recipientOfNBooleanRecipientWithArgumentsIs($arguments, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($true, $false, []))
				->mock($recipient)
					->receive('nbooleanRecipientIs')
						->withArguments($this->newTestedInstance($true, $false, $arguments))
							->once
		;
	}
}
