<?

namespace City;
class Flat {
    public $rooms;
    public $people;
    public $sq;
    public $floor;
    public $balcony_count;
    const HEATING = 1;

    private $cost_kommun_people;
    private $cost_kommun_sq;
    public $cost_kommun_people_month;
    public $cost_kommun_sq_month;

    public function __construct ($rooms,$people,$sq,$floor,$balcony_count){

        $this -> rooms = $rooms;
        $this -> people = $people;
        $this -> sq = $sq;
        $this -> floor = $floor;
        $this -> balcony_count = $balcony_count;
    }

    public function info () {

        $this -> cost ();

        echo  "In this apartment {$this ->rooms} room(s)<br>";
        echo  "Lives {$this -> people} people<br>";
        echo "Area of the appartment {$this ->sq} m <sup>2</sup> <br>";
        echo "Floor {$this -> floor}<br>";

        if ($this -> balcony_count != 0){

            echo "{$this -> balcony_count} balcony<br>";
        } else {
            echo " no balcony <br>";

        }


        echo "Your bill (Number of people) {$this -> cost_kommun_people}<br>";
        echo "Your rate (by area ) {$this -> cost_kommun_sq} UAH<br>";
        echo "Communal payments per month ( number of people) {$this -> cost_kommun_people_month} UAH<br>";
        echo "Communal payments per month ( for the area) {$this -> cost_kommun_sq_month} UAH<hr>";



    }




    public function addUnset($people, $flag = false){

        if (!$flag) {

            $this -> people += $people;
        } else {

            if ($this -> people - $people > 0 ) $this->people -= $people;
        }

        }

    public function cost () {

        $this -> cost_kommun_people = $this -> people * $this :: HEATING;
        $this -> cost_kommun_sq = $this -> sq * $this :: HEATING;
        $this -> cost_kommun_sq_month = $this -> cost_kommun_sq * date('t');
        $this -> cost_kommun_people_month = $this -> cost_kommun_people * date('t');
    }


 }
?>