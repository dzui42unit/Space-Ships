<?php

    class   Asteroid
    {
        private $_x;
        private $_y;

//        public function get_size()
//        {
//            return $this->p_size;
//        }

        public function get_x_pos()
        {
            return $this->_x;
        }

        public function get_y_pos()
        {
            return $this->_y;
        }

//        public function get_coord()
//        {
//            return $this->p_coords;
//        }

//        private function make_coords($p_size, $x, $y)
//        {
//            for ($i = 0; $i < $p_size; $i++)
//            {
//                for ($j = 0; $j < $p_size; $j++)
//                {
//                    $this->p_coords[$i][$j] = array($x + $i, $y + $j);
//                }
//            }
//        }

        public function __construct($x, $y)
        {
            $this->_x = $x;
            $this->_y = $y;
        }
    }

?>