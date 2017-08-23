<?php namespace estvoyage\ticTacToe\tests\units\exception\catcher\error;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class any extends units\test
{
	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($error = new \mock\error, $classname = new mockOfTicTacToe\php\classname),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($error, $classname))

			->if(
				$anError = new \error,
				$this->calling($block)->blockArgumentsAre = function() use ($anError) {
					throw $anError;
				}
			)
			->then
				->exception(function() use ($block) { $this->testedInstance->blockIs($block); })
					->isEqualTo($anError)

			->if(
				$this->calling($classname)->recipientOfPhpClassNameAsNStringIs = function($recipient) {
					$recipient->nstringIs('typeError');
				}
			)
			->then
				->exception(function() use ($block) { $this->testedInstance->blockIs($block); })
					->isEqualTo($anError)

			->if(
				$this->calling($block)->blockArgumentsAre = function() {
					throw new \typeError;
				}
			)
			->then
				->exception(function() use ($block) { $this->testedInstance->blockIs($block); })
					->isEqualTo($error)
		;
	}
}
