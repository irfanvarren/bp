<?php

namespace App;
class FisherYatesShuffle
{
    public $array,$seed,$shuffledArray;
    public function __construct($array,$seed){
        $this->array = $array;
        
        $this->seed = $seed;
    }
    public function shuffle(){
        $this->shuffledArray = $this->array;
        $len = $this->array->count();
        if($len > 1){
            mt_srand($this->seed);
            $i = $len - 1;
            for($i; $i >= 0; $i--){
                $j = rand(0, $i);
                    
                $tmp = $this->shuffledArray[$i];
                
                $this->shuffledArray[$i] = $this->shuffledArray[$j];
                $this->shuffledArray[$j] = $tmp;
            }
        }
        return $this->shuffledArray;  
    }
    public function shuffleQuestionsOptions(){
        $this->shuffledArray = $this->array;
        $len = $this->array->count();
        if($len > 1){
            mt_srand($this->seed);
            $i = $len - 1;
            for($i; $i >= 0; $i--){
                $j = rand(0, $i);
                $tmp = $this->shuffledArray[$i];
                $this->shuffledArray[$i] = $this->shuffledArray[$j];
                $this->shuffledArray[$j] = $tmp;
            }
            foreach($this->shuffledArray as $shuffledQuestion){
                
                $options = $shuffledQuestion->options;
                
                $len2 = $options->count();
                
                if($len2 > 1){
                    $k = $len2 - 1;
                    
                    for($k; $k >= 0; $k--){
                        $l = rand(0, $k);
                        $tmp2 = $options[$k];
                        $options[$k] = $options[$l];
                        $options[$l] = $tmp2;
                    }
                }   
            }
        }
        return $this->shuffledArray;
    }
    public function shuffleStructures(){
        $this->shuffledArray = $this->array;
        $len = $this->array->count();
        if($len > 1){
            mt_srand($this->seed);
            $i = $len - 1;
            for($i; $i >= 0; $i--){
                $j = rand(0, $i);
                $tmp = $this->shuffledArray[$i];
                $this->shuffledArray[$i] = $this->shuffledArray[$j];
                $this->shuffledArray[$j] = $tmp;
            }
            foreach($this->shuffledArray as $shuffledQuestion){
                
                $options = $shuffledQuestion->options;
                
                $len2 = $options->count();
                
                if($len2 > 1){
                    $k = $len2 - 1;
                    
                    for($k; $k >= 0; $k--){
                        $l = rand(0, $k);
                        $tmp2 = $options[$k];
                        $options[$k] = $options[$l];
                        $options[$l] = $tmp2;
                    }
                }   
            }
        }
        return $this->shuffledArray;
    }
    public function getSeed(){
        return $this->seed;
    }
    public function arrayBefore(){
        return $this->array;
    }
}
