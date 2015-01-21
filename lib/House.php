<?php
namespace Alex\City;
/**
 * Created by PhpStorm.
 * User: PC4-203
 * Date: 17.12.2014
 * Time: 9:39
 */

class House
{

    public $house_num;
    public $floors;
    public $porch;
    public $flats;
    public $col_flats;
    public $area;
    public $electricity;
    public $land_tax;
    public $pay_house;
    public $all_house_pay;
    public $all_people;
    const TARIFF_E = 25;
    const TARIFF_L = 10;



    public function __construct($house_num,$floors,$porch,$flats,$col_flats,$area){

        $this -> house_num = $house_num;
        $this -> floors = $floors;
        $this -> porch = $porch;
        $this -> flats = $flats;
        $this -> col_flats = $col_flats;
        $this -> area = $area;

    }
    public function bill(){

        $this -> electricity =  $this -> col_flats * $this :: TARIFF_E;
        $this -> land_tax =  $this -> area * $this :: TARIFF_L;

        foreach ($this -> flats as  $val){

            $val -> cost();
            $this -> pay_house += $val -> cost_kommun_people_month + $val -> cost_kommun_sq_month;
            $this -> all_people += $val -> people;
        }
        $this -> all_house_pay = $this -> electricity + $this -> land_tax + $this ->pay_house;
    }

    public function info(){
        $this -> pay_house = 0;
        $this -> all_people =0;

        $this -> bill();
        echo "House number: {$this -> house_num}<br>";
        echo "Floors: {$this -> floors}<br>";
        echo "Porches : {$this -> porch}<br>";
        echo "Flats : {$this -> col_flats}<br>";
        echo "area : {$this -> area}<br>";
        echo "Electricity bill: {$this -> electricity} UAH<br>";
        echo "Land tax: {$this -> land_tax} UAH<br>";
        echo "Utility bill: {$this -> pay_house} UAH<br>";
        echo "All house pay: {$this -> all_house_pay} UAH<hr>";

    }
}



