<?php

namespace App;

class GildedRose
{
    public $name;
    public $quality;
    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name != 'Aged Brie' && $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($this->quality > 0) {
                if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                   
                    $degradeRate = (strpos($this->name, 'Conjured') !== false) ? 2 : 1;
                    $this->quality -= $degradeRate;
                }
            }
        } else {
            if ($this->quality < 50) {
                $this->quality = $this->quality + 1;
                if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->sellIn < 11 && $this->quality < 50) {
                        $this->quality = $this->quality + 1;
                    }
                    if ($this->sellIn < 6 && $this->quality < 50) {
                        $this->quality = $this->quality + 1;
                    }
                }
            }
        }

        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
            $this->sellIn = $this->sellIn - 1;
        }

        if ($this->sellIn < 0) {
            if ($this->name != 'Aged Brie') {
                if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->quality > 0) {
                        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
                            $degradeRate = (strpos($this->name, 'Conjured') !== false) ? 2 : 1;
                            $this->quality -= $degradeRate;
                        }
                    }
                } else {
                    $this->quality = 0;
                }
            } else {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        } elseif ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
