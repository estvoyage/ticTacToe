<?php namespace estvoyage\ticTacToe\coordinate\row;

interface recipient
{
	function rowInTicTacToeBoardIs(matrix\coordinate\distance $row) :void;
}
