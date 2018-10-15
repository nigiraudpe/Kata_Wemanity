<?php

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {
            $item->update_quality();
        }
    }
}

class Item {

    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function update_quality() {

        $this->sell_in--;

        if ($this->quality !== 0) {
            $this->quality--;

            //decrease quality a second time if sell_in value is negative
            if ($this->sell_in < 0 && $this->quality !== 0) {
                $this->quality--;
            }
        }
    }

}

class LegendaryItem extends Item {

    function __construct($name, $quality)
    {
        parent::__construct($name, 0, $quality);
    }

    public function update_quality()
    {
        // Do nothing because legendary item quality will never change
        // and will never be sold
    }
}

class ConjuredItem extends Item {

    function __construct($name, $sell_in, $quality) {
        parent::__construct($name, $sell_in, $quality);
    }

    // update quality function
    public function update_quality() {
        //always decrease sell_in value no matter what
        $this->sell_in--;

        //decreaseQuality a first time
        $this->decrease_quality();

        //decreaseQuality a second time if sell_in value is negative
        if ($this->sell_in < 0 && $this->quality > 0) {
            $this->decrease_quality();
        }
    }

    // conjured item got their quality decreasing by two but is never negative
    private function decrease_quality() {
        if (($this->quality - 2) < 0) {
            $this->quality = 0;
        } else {
            $this->quality = $this->quality - 2;
        }

        //$this->quality = (($this->quality - 2) < 0) ? 0 : $this->quality - 2;
    }
}

class Fromage extends Item {

    function __construct($name, $sell_in, $quality) {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update_quality() {
        //always decrease sell_in value no matter what
        $this->sell_in--;

        if ($this->quality !== 50) {
            $this->quality++;

            if ($this->sell_in < 0 && $this->quality !== 50) {
                $this->quality ++;
            }
        }
    }
}

class Ticket extends Item {

    function __construct($name, $sell_in, $quality) {
        parent::__construct($name, $sell_in, $quality);
    }

    public function update_quality() {
        //always decrease sell_in value no matter what
        $this->sell_in--;

        if ($this->sell_in < 0) {
            $this->quality = 0;
        }
        else if ($this->quality !== 50) {
            $this->quality++;

            if ($this->sell_in <= 10 && $this->quality !== 50) {
                $this->quality++;

                if ($this->sell_in <= 5 && $this->quality !== 50) {
                    $this->quality++;
                }
            }
        }
    }
}
