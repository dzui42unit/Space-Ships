<?php

    class   Player
    {
        private $_name;
        private $_direction;
        private $_ships;
        private $_nb_ships;
        private $_coords;
        private $_active_ship;

        public function get_name()
        {
            return $this->_name;
        }

        public function get_direction()
        {
            return $this->_direction;
        }

        public function set_direction($direct)
        {
            $this->_direction = $direct;
        }

        public function get_fleet()
        {
            return $this->_ships;
        }

        public function set_fleet($fleet)
        {
            $this->_ships = $fleet;
        }

        public function get_nb_of_ships()
        {
            return $this->_nb_ships;
        }

        public function set_nb_of_ships($nb)
        {
            $this->_nb_ships = $nb;
        }

        public function get_coord()
        {
            return $this->_coords;
        }

        public function set_coord($coord)
        {
            $this->_coords = $coord;
        }

        public function get_active_ship()
        {
            return $this->_active_ship;
        }

        public function set_active_ship($flag)
        {
            if ($flag)
            {
                if ($this->_active_ship < count($this->_ships) - 1)
                    $this->_active_ship++;
                else
                    $this->_active_ship = 0;
            }
            else
                $this->_active_ship = 0;

        }

        public function set_ships($arr)
        {
            $this->_ships = $arr;
        }

        public static function doc()
        {
            return "<- Player ----------------------------------------------------------------------"."\n".file_get_contents('Player.doc.txt')."\n"."---------------------------------------------------------------------- Color ->"."\n";
        }

        public function __construct($name, $nb)
        {
            $this->_name = $name;
            $this->_direction = "";
            $this->_ships = array();
            $this->_nb_ships = $nb;
            $this->_coords = array();
            $this->_active_ship = 0;
        }
    }
?>