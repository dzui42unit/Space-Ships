<?php

    class   Asteroid
    {
        private $_x;
        private $_y;

        public function get_x_pos()
        {
            return $this->_x;
        }

        public function get_y_pos()
        {
            return $this->_y;
        }

        public static function doc()
        {
            return "<- Asteroid ----------------------------------------------------------------------"."\n".file_get_contents('Asteroid.doc.txt')."\n"."---------------------------------------------------------------------- Color ->"."\n";
        }

        public function __construct($x, $y)
        {
            $this->_x = $x;
            $this->_y = $y;
        }
    }

?>