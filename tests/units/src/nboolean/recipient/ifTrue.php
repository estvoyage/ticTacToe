<?php namespace estvoyage\ticTacToe\tests\units\nboolean\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ifTrue extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\nboolean\recipient')
		;
	}

	function test__construct()
	{
		$this
			->given(
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->newTestedInstance(
					$block
				)
			)
			->then
				->object($this->testedInstance)->isEqualTo($this->newTestedInstance($block, []))
		;
	}

	function testNBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block, $arguments = [ '', uniqid(), rand(PHP_INT_MIN, PHP_INT_MAX), M_PI, null, true, false, new \stdClass, [] ])
			)
			->if(
				$this->testedInstance->nbooleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $arguments))
				->mock($block)
					->receive('blockArgumentsAre')
						->never
			->if(
				$this->testedInstance->nbooleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, $arguments))
				->mock($block)
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
				$this->newTestedInstance($block = new mockOfTicTacToe\block, [])
			)
			->if(
				$this->testedInstance->recipientOfNBooleanRecipientWithArgumentsIs($arguments, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block, []))
				->mock($recipient)
					->receive('nbooleanRecipientIs')
						->withArguments($this->newTestedInstance($block, $arguments))
							->once
		;
	}
}
