<?php
use PHPUnit\Framework\TestCase;
include './boolean-algebra.php';

class BooleanAlgebraTest extends TestCase {

  /**
   * @dataProvider isPointInRectProvider
   */
  public function testIsPointInRect($x,$y,$result) {
    $rect = new Rect(2,4,5,6);
    $actual = isPointInRect($x,$y,$rect);
    $this->assertEquals($result,$actual);
  }

  public function isPointInRectProvider() {
    return [
    'off left side'=>[1,6,false],
    'off right side'=>[8,6,false],
    'off top side'=>[4,2,false],
    'off bottom side'=>[4,11,false],
    'inside'=>[3,5,true],
    'on left side'=>[2,6,true],
    'on right side'=>[7,6,true],
    'on top side'=>[4,4,true],
    'on bottom side'=>[4,10,true]
    ];
  }

  /**
   * @dataProvider isRectInRectProvider
   */
  public function testIsRectInRect($x,$y,$result) {
    $rect1 = new Rect($x,$y,2,2);
    $rect2 = new Rect(2,4,5,6);

    $actual = isRectInRect($rect1,$rect2);
    $this->assertEquals($result,$actual);
  }

  public function testIsRectInRect_ConsumesTheInner() {
    $rect1 = new Rect(-100,-100,10000,10000);
    $rect2 = new Rect(2,4,5,6);

    $actual = isRectInRect($rect1,$rect2);
    $this->assertEquals(true,$actual);
  }

  public function isRectInRectProvider() {
    return [
    'off left side'=> [-10,4,false],
    'off right side'=> [100,4,false],
    'off top side'=> [4,-10,false],
    'off bottom side'=> [4,100,false],
    'overlaps left side'=> [1,4,true],
    'overlaps right side'=> [6,4,true],
    'overlaps top side'=> [4,3,true],
    'overlaps bottom side'=> [4,9,true],
    'inside'=> [3,5,true],
    'right on left side'=> [0,6,false],
    'on right side'=> [7,6,false],
    'on top side'=> [4,2,false],
    'on bottom side'=> [4,10,false],
    ];
  }

}
