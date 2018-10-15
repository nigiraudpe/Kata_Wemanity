<?php

require_once 'gilded_rose.php';

echo "OMGHAI!\n";

$items = array(
    new Item('+5 Dexterity Vest', 10, 20),
    new Fromage('Aged Brie', 2, 0),
    new Item('Elixir of the Mongoose', 5, 7),
    new LegendaryItem('Sulfuras, Hand of Ragnaros', 80),
    new LegendaryItem('Sulfuras, Hand of Ragnaros', 80),
    new Ticket('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new Ticket('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new Ticket('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    new ConjuredItem('Conjured Mana Cake', 3, 29)
);

$app = new GildedRose($items);

$days = 30;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->update_quality();
}
