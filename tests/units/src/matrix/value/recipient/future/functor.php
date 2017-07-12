<?php namespace estvoyage\ticTacToe\tests\units\matrix\value\recipient\future;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\value\recipient')
		;
	}

	function testBlockIs()
	{
		$this
			->given(
				$this->newTestedInstance($forValue = function() use (& $valueArguments) { $valueArguments = func_get_args(); }, $ifNoBinding = function() use (& $noBindingArguments) { $noBindingArguments = func_get_args(); }),
				$block = new mockOfTicTacToe\block
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($forValue, $ifNoBinding))
				->variable($valueArguments)
					->isNull
				->array($noBindingArguments)
					->isEmpty

			->given(
				$value = uniqid(),
				$this->calling($block)->blockArgumentsAre = function($future) use ($value) {
					$future->matrixValueIs($value);
				}
			)
			->if(
				$this->testedInstance->blockIs($block)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($forValue, $ifNoBinding))
				->array($valueArguments)
					->isEqualTo([ $value ])
				->array($noBindingArguments)
					->isEmpty
		;
	}

	function testMatrixValueIs()
	{
		$this
			->given(
				$this->newTestedInstance($forValue = function() use (& $valueArguments) { $valueArguments = func_get_args(); }, $ifNoBinding = function() use (& $noBindingArguments) { $noBindingArguments = func_get_args(); }),
				$value = uniqid()
			)
			->if(
				$this->testedInstance->matrixValueIs($value)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($forValue, $ifNoBinding))
		;
	}
}
