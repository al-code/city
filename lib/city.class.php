<?php

namespace Alex\City;
class City
{
    public $name_city;
    public $tax_ground; // налог на землю со всех домов
    public $pay; // платежи со всех домов
    public $all_people; // колличество людей в городе
    public $streets; // массив улиц


    public function __construct($name_city,$streets){

        $this -> name_city = $name_city;
        $this -> streets = $streets;
    }

    public function taxGround(){

        foreach ($this -> streets as $val){
            $val -> allHouses();
            $this -> tax_ground += $val -> tax_ground_house;
            $this -> all_people += $val -> all_people;
            $this -> pay += $val -> pay;



        }
    }


    public function Info (){
        $this -> tax_ground = 0;
        $this -> all_people = 0;
        $this -> pay = 0;

        $this -> taxGround();



        echo "Name of the city: {$this -> name_city}<br>";
        echo "Population of the city: {$this -> all_people}<br>";
        echo "Utillity bill for all houses: {$this -> pay} UAH<br>";
        echo "All taxes for the land: {$this -> tax_ground} UAH<hr>";

    }

    public function information ($street,$house,$flat) {

        if (isset($street) && isset ($house) && isset($flat)) {

            foreach ($this -> streets as $key =>$values){

                if ($key == $street - 1){

                    $values -> info ();
                    $values -> houses[$house - 1 ] ->  info();
                    $values -> houses[$house - 1 ] -> flats[$flat - 1] -> info();
                }
            }

        }

    }


}




