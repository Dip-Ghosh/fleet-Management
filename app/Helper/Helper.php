<?php
namespace App\Helper;

class Helper
{

    public static function IDGenerator($model, $trow, $length = 4, $prefix){

        $data = $model::orderBy('id','desc')->first();
          
        if(!$data){
            $originalLength = $length-1;
            $lastNumber = 1;
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actualLastNumber = ($code/1)*1;
            $incrementLastNumber = (int)($actualLastNumber)+1;
            $lastNumberLength = strlen($incrementLastNumber);
            $originalLength = $length - $lastNumberLength;
            $lastNumber = $incrementLastNumber;
        }
        $zeros = "";
     
        for($i=0; $i< $originalLength; $i++){
            $zeros.="0";
        }
        return $prefix.'-'.$zeros.$lastNumber;
    }

}
