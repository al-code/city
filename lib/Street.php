<?php
namespace Alex\City;

class Street
{
    public $name_street;
    public $col_houses; // кол-во домов
    public $houses; // массив домов
    public $length_street;
    public $col_janitor; // кол-во дворников
    public $sq_houses; // площадь прилегающей территории
    public $pay; //объем коммунальных платежей, которые будут получены со всех домов
    public $tax_ground_house; //объем коммунальных платежей, которые будут получены со всех домов
    public $all_people; // кол-во человек, живущих на этой улице
    const WORK = 20; // площадь, обрабатываемая одним дворником
    const AREA = 10; // прилегающая к дому территория


    public function __construct($name_street,$col_houses,$houses,$length_street){

        $this -> name_street = $name_street;
        $this -> houses = $houses;
        $this -> col_houses = $col_houses;
        $this -> length_street = $length_street;
    }

   public function colJanitors(){
       $this -> col_janitor = round($this -> sq_houses / $this :: WORK);
   }

    public function allHouses(){

        foreach ($this -> houses as $val){
            $val -> bill();
            $this -> pay += $val -> all_house_pay;
            $this -> sq_houses += $val -> area + $this::AREA;
            $this -> tax_ground_house += $val -> land_tax;
            $this -> all_people += $val -> all_people;

        }
    }
    public function info (){
        $this -> pay = 0;
        $this -> sq_houses = 0;
        $this -> tax_ground_houses = 0;
        $this -> all_people = 0;
        $this -> allHouses();
        $this -> colJanitors();


        echo "Sreeet number: {$this -> name_street}<br>";
        echo "Houses {$this -> col_houses}<br>";
        echo "Area of houses: {$this -> sq_houses}<br>";
        echo "You need {$this -> col_janitor} janitors<br>";
        echo "Utillity bill for all houses {$this -> pay} UAH<hr>";

    }
}




