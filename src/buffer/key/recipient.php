<?php namespace estvoyage\ticTacToe\buffer\key;

use estvoyage\ticTacToe\buffer;

interface recipient
{
	function bufferKeyIs(buffer\key $key) :void;
}
