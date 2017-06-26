<?php

    class   Player
    {
        private $p_name;
        private $p_direction;
        private $p_ships;
        private $p_nb_ships;
        private $p_coords;
        private $p_active_ship;

        public function get_name()
        {
            return $this->p_name;
        }

        public function get_direction()
        {
            return $this->p_direction;
        }

        public function set_direction($direct)
        {
            $this->p_direction = $direct;
        }

        public function get_fleet()
        {
            return $this->p_ships;
        }

        public function set_fleet($fleet)
        {
            $this->p_ships = $fleet;
        }

        public function get_nb_of_ships()
        {
            return $this->p_nb_ships;
        }

        public function set_nb_of_ships($nb)
        {
            $this->p_nb_ships = $nb;
        }

        public function get_coord()
        {
            return $this->p_coords;
        }

        public function set_coord($coord)
        {
            $this->p_coords = $coord;
        }

        public function get_active_ship()
        {
            return $this->p_active_ship;
        }

        public function set_active_ship($flag)
        {
            if ($flag)
            {
                if ($this->p_active_ship < count($this->p_ships) - 1)
                    $this->p_active_ship++;
                else
                    $this->p_active_ship = 0;
            }
            else
                $this->p_active_ship = 0;

        }

        public function set_ships($arr)
        {
            $this->p_ships = $arr;
        }

        public function print_info()
        {
            echo "Name: ".$this->get_name()."<br>";
            echo "Number of ships: ".$this->get_nb_of_ships()."<br>";
            echo "Direction: ".$this->get_direction()."<br>";
            print_r($this->p_ships);
            echo "<br>";
        }

        public function __construct($name, $nb)
        {
            $this->p_name = $name;
            $this->p_direction = 'Left';
            $this->p_ships = array();
            $this->p_nb_ships = $nb;
            $this->p_coords = array();
            $this->p_active_ship = 0;
        }
    }
?>