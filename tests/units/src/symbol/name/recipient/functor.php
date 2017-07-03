<?php namespace estvoyage\ticTacToe\tests\units\symbol\name\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\name\recipient')
		;
	}

	function testTicTacToeSymbolIsX()
	{
		$this
			->given(
				$xArguments = null,
				$oArguments = null,
				$this->newTestedInstance(
					$callableForX = function() use (& $xArguments) { $xArguments = true; },
					$callableForO = function() use (& $oArguments) { $oArguments = false; }
				)
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIsX()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callableForX, $callableForO))
				->boolean($xArguments)
					->isTrue
				->variable($oArguments)
					->isNull
		;
	}

	function testTicTacToeSymbolIsO()
	{
		$this
			->given(
				$xArguments = null,
				$oArguments = null,
				$this->newTestedInstance(
					$callableForX = function() use (& $xArguments) { $xArguments = true; },
					$callableForO = function() use (& $oArguments) { $oArguments = true; }
				)
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIsO()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callableForX, $callableForO))
				->variable($xArguments)
					->isNull
				->boolean($oArguments)
					->isTrue
		;
	}
}
