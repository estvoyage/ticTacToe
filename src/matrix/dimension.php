<?php namespace estvoyage\ticTacToe\matrix;

interface dimension
{
	function recipientOfMatrixSizeIs(size $size, size\recipient $recipient) :void;
	function recipientOfNumberOfRowsInMatrixIs(dimension\row\recipient $recipient) :void;
	function recipientOfNumberOfColumnsInMatrixIs(dimension\column\recipient $recipient) :void;
}
