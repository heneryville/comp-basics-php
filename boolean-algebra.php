<?php

class Rect {
  public $x;
  public $y;
  public $w;
  public $h;

  function __construct($x,$y,$w,$h) {
    $this->$x = $x;
    $this->$y = $y;
    $this->$w = $w;
    $this->$h = $h;
  }
}

function isPointInRect($x,$y,$rect) {
  throw new Exception('Not yet implemented');
}

function isRectInRect($rect1,$rect2) {
  throw new Exception('Not yet implemented');
}
