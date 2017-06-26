<?php

    class Ship
    {
        private $_x;
        private $_y;
        private $_hp;
        private $_range;
        private $_pp;
        private $_name;
        private $_pp_init;
        private $_damage;
        private $_shoot_energy;

        public function get_name()
        {
            return $this->_name;
        }

        public function get_x_pos()
        {
            return $this->_x;
        }

        public function get_y_pos()
        {
            return $this->_y;
        }

        public function move_up()
        {
            $this->_x--;
        }

        public function move_down()
        {
            $this->_x++;
        }

        public function move_left()
        {
            $this->_y--;
        }

        public function move_right()
        {
            $this->_y++;
        }

        public function get_power_point()
        {
            return $this->_pp;
        }

        public function get_hp()
        {
            return $this->_hp;
        }

        public function get_range()
        {
            return $this->_range;
        }

        public function get_hit($damage)
        {
            $this->_hp -= $damage;
        }

        public function set_power($dec)
        {
            $this->_pp -= $dec;
        }

        public function set_init_power()
        {
            $this->_pp = $this->_pp_init;
        }
        public function set_hp($hp)
        {
            $this->_hp -= $hp;
        }
        public function get_damage()
        {
            return $this->_damage;
        }

        public function get_shoot_energy()
        {
            return $this->_shoot_energy;
        }

        public static function doc()
        {
            return "<- Ship ----------------------------------------------------------------------"."\n".file_get_contents('Ship.doc.txt')."\n"."---------------------------------------------------------------------- Color ->"."\n";
        }

        public function __construct($name, $range, $hp, $pp, $x, $y, $damage, $shoot_energy)
        {
            $this->_name = $name;
            $this->_range = $range;
            $this->_hp = $hp;
            $this->_pp = $pp;
            $this->_pp_init = $pp;
            $this->_x = $x;
            $this->_y = $y;
            $this->_damage = $damage;
            $this->_shoot_energy = $shoot_energy;
        }
    }

?>