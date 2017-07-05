<?php namespace estvoyage\ticTacToe\coordinate\recipient;

use estvoyage\ticTacToe\{ coordinate, block, ninteger };

class indexer
	implements
		coordinate\recipient
{
	private
		$width,
		$height,
		$blockForKey,
		$blockForInvalidLineOrColumn
	;

	function __construct(int $width, int $height, block $blockForKey, block $blockForInvalidLineOrColumn)
	{
		$this->width = $width;
		$this->height = $height;
		$this->blockForKey = $blockForKey;
		$this->blockForInvalidLineOrColumn = $blockForInvalidLineOrColumn;
	}

	function lineAndColumnOfTicTacToeSymbolIs(int $line, int $column) :void
	{
		(
			new ninteger\operation\unary\collection(
				new ninteger\operation\unary\multiplication($this->height, $this->blockForInvalidLineOrColumn),
				new ninteger\operation\unary\addition($column, $this->blockForInvalidLineOrColumn)
			)
		)
			->recipientOfOperationWithNIntegerIs(
				$line,
				new ninteger\recipient\comparison\unary(
					new ninteger\comparison\unary\between(0, ($this->width * $this->height) - 1),
					new ninteger\comparison\unary\recipient\ifTrueElse(
						$this->blockForKey,
						$this->blockForInvalidLineOrColumn
					)
				)
			)
		;
	}
}
