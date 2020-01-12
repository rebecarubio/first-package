<?php
require 'vendor/autoload.php';
include 'orders.php';

$orders = new orders();

$faker = Faker\Factory::create();

//generate Date
$dates = array();
for ($i = 0; $i <= 1000; $i++) {
    $dateTimeStamp = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null);
    echo $date= $dateTimeStamp->format('Y-m-d'), "\n";
    $dates[$i]=$date;
    

}

//generate Company
$companies=array();
for ($i = 0; $i <= 1000; $i++) {
    echo $company= $faker->company, "\n";
    $companies[$i]=$company;
}

//generate Qty
$quantity=array();
for ($i = 0; $i <= 1000; $i++) {
    echo $qty= $faker->numberBetween(0, 10000), "\n";
    $quantity[$i]= $qty;
}

$orders->insertData($dates, $companies, $quantity);

?>