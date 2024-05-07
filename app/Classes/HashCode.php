<?php


    namespace App\Classes;
    use App\Extend\Bentools\StringCombinations;

    class HashCode {
        private static $range = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v','w', 'x', 'y', 'z','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z' , 1 , 2 , 3 , 4 , 5, 6, 7, 8, 9 , 0];
        private int $length;
        private string $prefix;
        private string $suffix;
        public $hashcodes = [];

        public function __construct($length , $prefix = '' , $suffix = '' , $range = []){
            $this->length = $length;
            $this->prefix = $prefix;
            $this->suffix = $suffix;
            if($range != []){
                self::$range = $range;
            }
        }

        public function generate(){
            $this->hashcodes = $this->string_combinations(self::$range , $this->length , $this->length , '' , $this->prefix , $this->suffix)->asArray();
        }

        private function string_combinations($charset, int $min = 1, ?int $max = null, string $glue = '' , string $prefix = '' , string $suffix = ''): StringCombinations
        {
            return new StringCombinations($charset, $min, $max, $glue , $prefix , $suffix);
        }
    }
