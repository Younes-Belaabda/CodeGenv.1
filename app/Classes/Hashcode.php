<?php

    namespace App\Classes;

    class Hashcode {
        const ALLCASES   = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ0123456789';
        const SMALLCASES = 'abcdefghijklmnopqrstuvwxyz';
        const UPPERCASES = 'ABCDEFGHIJKLMNOPQRSTUVWYZ';
        const NUMBERS    = '0123456789';

        private $prefix;
        private $suffix;
        // private $length;
        private $smallcase_count;
        private $uppercase_count;
        private $number_count;
        private $smallcase_random_text;
        private $uppercase_random_text;
        private $numbers_random_text;
        private $chars;

        public function __construct(){
        }

        public function init($prefix , $suffix , $smallcase_count , $uppercase_count , $number_count , $chars = []){
            $this->prefix          = $prefix;
            $this->suffix          = $suffix;
            $this->smallcase_count = $smallcase_count;
            $this->uppercase_count = $uppercase_count;
            $this->number_count    = $number_count;
            $this->chars = $chars;
        }

        private function shuffle_smallcases(){
            if($this->smallcase_count > 0){
                $this->smallcase_random_text = substr(str_shuffle(self::SMALLCASES) , 0 , $this->smallcase_count);
            }
            return $this;
        }

        private function shuffle_uppercases(){
            if($this->uppercase_count > 0){
                $this->uppercase_random_text = substr(str_shuffle(self::UPPERCASES) , 0 , $this->uppercase_count);
            }
            return $this;
        }

        private function shuffle_numbers(){
            if($this->number_count > 0){
                $this->numbers_random_text = substr(str_shuffle(self::NUMBERS) , 0 , $this->number_count);
            }
            return $this;
        }

        private function shuffle_all(){
            $this->shuffle_smallcases()->shuffle_uppercases()->shuffle_numbers();
            return $this->smallcase_random_text . $this->uppercase_random_text . $this->numbers_random_text;
        }

        // private function shuffle_to_complete($text){
        //     $count = $this->length - strlen($text);
        //     return substr(str_shuffle(self::ALLCASES) , 0 , $count);
        // }

        public function random(){
            $shuffle_all         = $this->shuffle_all();
            // $shuffle_to_complete = $this->shuffle_to_complete($shuffle_all);
            // $to_shuffle = $shuffle_all . $shuffle_to_complete;
            // return str_shuffle($to_shuffle);
            return $this->prefix . str_shuffle($shuffle_all) . $this->suffix;
        }

        public function get(){
            $code = $this->random();
            if($this->chars){
                foreach($this->chars as $char){
                    $code[$char['number'] - 1] = $char['char'];
                }
            }
            return $code;
        }
    }
