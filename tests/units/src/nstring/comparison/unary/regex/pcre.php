<?php namespace estvoyage\ticTacToe\tests\units\nstring\comparison\unary\regex;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class pcre extends units\test
{
	function testConditionForComparisonWithNStringIs()
	{
		$this
			->given(
				$this->newTestedInstance($regex = new mockOfTicTacToe\regex\pcre),
				$nstring = uniqid(),
				$condition = new mockOfTicTacToe\condition
			)
			->if(
				$this->testedInstance->conditionForComparisonWithNStringIs($nstring, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex))
				->mock($condition)
					->receive('nbooleanIs')
						->never

			->given(
				$this->calling($regex)->recipientOfPcreRegexAsNstringIs = function($recipient) {
					$recipient->nstringIs('/foo/');
				}
			)
			->if(
				$this->testedInstance->conditionForComparisonWithNStringIs($nstring, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(false)
							->once

			->given(
				$nstring = uniqid() . 'foo' . uniqid()
			)
			->if(
				$this->testedInstance->conditionForComparisonWithNStringIs($nstring, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($regex))
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once
		;
	}
}
