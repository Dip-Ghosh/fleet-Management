<?php

namespace App\Helper;
use App\Traits\ImageUpload;

class ApiDataUpdateHelper
{
    use ImageUpload;

    /**
     * @param $bodyParams
     * @param $filterParam
     * @return array
     */
    public function uploadUserDocuments($bodyParams,$filterParam){
      
        $filteredValues = [];
        foreach ($filterParam as $key){
            if(isset($bodyParams[$key]) && !empty($bodyParams[$key] &&  file_exists($bodyParams[$key]))){
                $filteredValues[$key] = $this->uploadImage($bodyParams[$key]);
            }
        }

        return $filteredValues;
    }

}