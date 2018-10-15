<?php

require_once '../src/gilded_rose.php';

class GildedRoseTest /*extends PHPUnit_Framework_TestCase*/ {

    function BasicItemsTests() {

        echo("---------- Basic Items Tests ----------\n");

        $basicItem = new Item("Basic Item", 11, 30);
        $items = array($basicItem);
        $gildedRose = new GildedRose($items);

        //Test One Day
        $gildedRose->update_quality();

        if ($basicItem->sell_in == 10 && $basicItem->quality == 29) {
            echo("One Day Ok\n");
        }
        else {
            echo("One Day didn't work properly\n");
        }

        //Test Ten Days
        for ($i = 0; $i < 10; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => sell_in = 10 && quality = 29
        if ($basicItem->sell_in == 0 && $basicItem->quality == 19) {
            echo("Ten Days Ok\n");
        }
        else {
            echo("Ten Days didn't work properly\n");
        }

        //Negative sell_in value
        $gildedRose->update_quality();

        //Before updating => sell_in = 0 && quality = 19
        if ($basicItem->sell_in == -1 && $basicItem->quality == 17) {
            echo("Negative sell_in value Ok\n");
        }
        else {
            echo("Negative sell_in value didn't work properly\n");
        }

        //Negative quality value
        //Updating value twenty times so we are sure quality will decrease far below than 0 if code doesn't work
        for ($i = 0; $i < 20; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => quality = 17
        if ($basicItem->quality >= 0) {
            echo("No negative quality value\n");
        }
        else {
            echo("Negative quality value => didn't work properly\n");
        }
    }

    function LegendaryItemsTests() {

        echo("---------- Legendary Items Tests ----------\n");

        //Over 9000 quality
        $item = new LegendaryItem("Legendary Item", 9001);
        $items = array($item);
        $gildedRose = new GildedRose($items);

        //Test One Day
        $gildedRose->update_quality();

        if ($item->sell_in == 0 && $item->quality == 9001) {
            echo("One Day Ok\n");
        }
        else {
            echo("One Day didn't work properly\n");
        }

        //Test Ten Days
        for ($i = 0; $i < 10; $i++) {
            $gildedRose->update_quality();
        }

        if ($item->sell_in == 0 && $item->quality == 9001) {
            echo("Ten Days Ok\n");
        }
        else {
            echo("Ten Days didn't work properly\n");
        }

        //Sell_in value and quality never updated so no need to test negative sell_in value or negative quality
    }

    function ConjuredItemsTests() {

        echo("---------- Conjured Items Tests ----------\n");

        $item = new ConjuredItem("Conjured Item", 11, 30);
        $items = array($item);
        $gildedRose = new GildedRose($items);

        //Test One Day
        $gildedRose->update_quality();

        if ($item->sell_in == 10 && $item->quality == 28) {
            echo("One Day Ok\n");
        }
        else {
            echo("One Day didn't work properly\n");
        }

        //Test Ten Days
        for ($i = 0; $i < 10; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => sell_in = 10 && quality = 28
        if ($item->sell_in == 0 && $item->quality == 8) {
            echo("Ten Days Ok\n");
        }
        else {
            echo("Ten Days didn't work properly\n");
        }

        //Negative sell_in value
        $gildedRose->update_quality();

        //Before updating => sell_in = 0 && quality = 8
        if ($item->sell_in == -1 && $item->quality == 4) {
            echo("Negative sell_in value Ok\n");
        }
        else {
            echo("Negative sell_in value didn't work properly\n");
        }

        //Negative quality value
        //Updating value twenty times so we are sure quality will decrease far below than 0 if code doesn't work
        for ($i = 0; $i < 20; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => quality = 17
        if ($item->quality >= 0) {
            echo("No negative quality value\n");
        }
        else {
            echo("Negative quality value => didn't work properly\n");
        }
    }

    function FromageTests() {

        echo("---------- Fromage Tests ----------\n");

        $item = new Fromage("Aged Brie", 11, 20);
        $items = array($item);
        $gildedRose = new GildedRose($items);

        //Test One Day
        $gildedRose->update_quality();

        if ($item->sell_in == 10 && $item->quality == 21) {
            echo("One Day Ok\n");
        }
        else {
            echo("One Day didn't work properly\n");
        }

        //Test Ten Days
        for ($i = 0; $i < 10; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => sell_in = 10 && quality = 21
        if ($item->sell_in == 0 && $item->quality == 31) {
            echo("Ten Days Ok\n");
        }
        else {
            echo("Ten Days didn't work properly\n");
        }

        //Negative sell_in value
        $gildedRose->update_quality();

        //Before updating => sell_in = 0 && quality = 31
        if ($item->sell_in == -1 && $item->quality == 33) {
            echo("Negative sell_in value Ok\n");
        }
        else {
            echo("Negative sell_in value didn't work properly\n");
        }

        //Maximum quality value
        //Updating value twenty times so we are sure quality will increase far more than 50 if code doesn't work
        for ($i = 0; $i < 20; $i++) {
            $gildedRose->update_quality();
        }

        if ($item->quality <= 50) {
            echo("Maximum quality value not exceeded\n");
        }
        else {
            echo("Quality > maximum quality value => didn't work properly\n");
        }
    }

    function TicketTests() {

        echo("---------- BackstagePass Tests ----------\n");

        $item = new Ticket("Backstage Pass", 22, 2);
        $items = array($item);
        $gildedRose = new GildedRose($items);

        //Test One Day
        $gildedRose->update_quality();

        if ($item->sell_in == 21 && $item->quality == 3) {
            echo("One Day Ok\n");
        }
        else {
            echo("One Day didn't work properly\n");
        }

        //Test Ten Days
        for ($i = 0; $i < 10; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => sell_in = 21 && quality = 3
        if ($item->sell_in == 11 && $item->quality == 13) {
            echo("Ten Days Ok\n");
        }
        else {
            echo("Ten Days didn't work properly\n");
        }

        //Ten days or less before concert
        $gildedRose->update_quality();

        //Before updating => sell_in = 11 && quality = 13
        if ($item->sell_in == 10 && $item->quality == 15) {
            echo("Ten Days or less before concert Ok\n");
        }
        else {
            echo("Ten Days or less before concert didn't work properly\n");
        }

        for ($i = 0; $i < 4; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => sell_in = 10 && quality = 15
        if ($item->sell_in == 6 && $item->quality == 23) {
            echo("Six days before concert Ok\n");
        }
        else {
            echo("Six days before concert didn't work properly\n");
        }

        //Five days or less before concert
        $gildedRose->update_quality();

        //Before updating => sell_in = 6 && quality = 23
        if ($item->sell_in == 5 && $item->quality == 26) {
            echo("Five Days or less before concert Ok\n");
        }
        else {
            echo("Five Days or less before concert didn't work properly\n");
        }

        for ($i = 0; $i < 5; $i++) {
            $gildedRose->update_quality();
        }

        //Before updating => sell_in = 5 && quality = 26
        if ($item->sell_in == 0 && $item->quality == 41) {
            echo("Last day before concert Ok\n");
        }
        else {
            echo("Last day before concert didn't work properly\n");
        }

        //Negative sell_in value
        //Before updating => sell_in = 0 && quality = 41
        if ($item->sell_in == -1 && $item->quality == 0) {
            echo("Negative sell_in value Ok\n");
        }
        else {
            echo("Negative sell_in value didn't work properly\n");
        }

        $newItem = new Ticket("Backstage Pass", 20, 40);
        $newItems = array($newItem);
        $newGildedRose = new GildedRose($newItems);

        //Maximum quality value
        for ($i = 0; $i < 20; $i++) {
            $newGildedRose->update_quality();
        }

        if ($newItem->sell_in == 0 && $newItem->quality <= 50) {
            echo("Maximum quality value not exceeded\n");
        }
        else {
            echo("Quality > maximum quality value => didn't work properly\n");
        }
    }
}

$gildedRoseTest = new GildedRoseTest();

$gildedRoseTest->BasicItemsTests();
$gildedRoseTest->LegendaryItemsTests();
$gildedRoseTest->ConjuredItemsTests();
$gildedRoseTest->FromageTests();
$gildedRoseTest->TicketTests();

