<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    public function orderWallet($array){
        do
        {
            $swapped = false;
            for( $i = 0, $c = count( $array ) - 1; $i < $c; $i++ )
            {
                if( $array[$i] < $array[$i + 1] )
                {
                    list( $array[$i + 1], $array[$i] ) =
                            array( $array[$i], $array[$i + 1] );
                    $swapped = true;
                }
            }
        }
        while( $swapped );
        return $array;
    }

    public function transformWallet(){
        $tune_wallet = array();

        for ($i = 0; $i < count($this->wallet) ; $i++) { 
            if (is_int($this->wallet[$i]))
                array_push($tune_wallet, $this->wallet[$i]);
        }

        return $tune_wallet;
    }

    public function restore_wallet($tune_wallet)
    {
        for ($i = 0; $i < count($this->wallet) ; $i++) {
            if (is_int($this->wallet[$i]) == false)
            {
                array_push($tune_wallet, $this->wallet[$i]);
            }            
        }
        return $tune_wallet;
    }
    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        /** @TODO */
        if ($this->total < $price)
            return false;

        $tune_wallet = $this->transformWallet();
        $tune_wallet = $this->orderWallet($tune_wallet);
        
        $sum = 0;
        for ($i = 0; $i < count($tune_wallet) ; $i++) { 
            if ($tune_wallet[$i] < $price)
            {
                if ($sum < $price)
                {
                    $sum += $tune_wallet[$i];
                    unset($tune_wallet[$i]);
                }
                else
                    break;
                
            }
            else {
                unset($tune_wallet[$i]);
                break;
            }
        }
        $this->restore_wallet($tune_wallet);
        // $this->orderWallet();

        return true;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
