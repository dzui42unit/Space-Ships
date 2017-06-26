<?php

    class Ship
    {
        private $p_x;
        private $p_y;
        private $p_hp;
        private $p_range;
        private $p_pp;
        private $p_name;
        private $p_pp_init;
        private $p_damage;
        private $p_shoot_energy;

        public function get_name()
        {
            return $this->p_name;
        }

        public function get_x_pos()
        {
            return $this->p_x;
        }

        public function get_y_pos()
        {
            return $this->p_y;
        }

        public function move_up()
        {
            $this->p_x--;
        }

        public function move_down()
        {
            $this->p_x++;
        }

        public function move_left()
        {
            $this->p_y--;
        }

        public function move_right()
        {
            $this->p_y++;
        }

        public function get_power_point()
        {
            return $this->p_pp;
        }

        public function get_hp()
        {
            return $this->p_hp;
        }

        public function get_range()
        {
            return $this->p_range;
        }

        public function get_hit($damage)
        {
            $this->p_hp -= $damage;
        }

        public function set_power($dec)
        {
            $this->p_pp -= $dec;
        }

        public function set_init_power()
        {
            $this->p_pp = $this->p_pp_init;
        }
        public function set_hp($hp)
        {
            $this->p_hp -= $hp;
        }
        public function get_damage()
        {
            return $this->p_damage;
        }

        public function print_info()
        {
            echo "Name: ".$this->p_name."\n";
            echo "Range: ".$this->p_range."\n";
            echo "PP: ".$this->p_pp."\n";
            echo "HP: ".$this->p_hp."\n";
            echo "X: ".$this->p_x."\n";
            echo "Y: ".$this->p_y."\n";
        }

        public function get_shoot_energy()
        {
            return $this->p_shoot_energy;
        }

        public function __construct($name, $range, $hp, $pp, $x, $y, $damage, $shoot_energy)
        {
            $this->p_name = $name;
            $this->p_range = $range;
            $this->p_hp = $hp;
            $this->p_pp = $pp;
            $this->p_pp_init = $pp;
            $this->p_x = $x;
            $this->p_y = $y;
            $this->p_damage = $damage;
            $this->p_shoot_energy = $shoot_energy;
        }
    }

?>