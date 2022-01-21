<?php

namespace App\Helper;

use App\Traits\ImageUpload;

class ApiDataRequestHelper
{
   use ImageUpload;

    /**
     * @param $bodyParams
     * @param $FilterData
     * @return array
     */
   public function getRequestBodyParams($bodyParams, $FilterData){
        $filteredValues = [];
        foreach ($FilterData as $key){
            if(isset($bodyParams[$key]) && !empty($bodyParams[$key])){
                $filteredValues[$key] = $bodyParams[$key];
            }
        }

        return $filteredValues;
    }

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

    /**
     * @param $bodyParams
     * @param $filterParam
     * @param $imageExistence
     * @return array
     */
    public function deleteAndUploadDocuments($bodyParams,$filterParam,$imageExistence) {
        
        $filteredValues = [];
        foreach ($filterParam as $key){
            if(isset($bodyParams[$key]) && !empty($bodyParams[$key] &&  file_exists($bodyParams[$key]))){
                if(!empty($imageExistence[$key])){
                    $this->deleteExistingImage($imageExistence[$key]);
                }
                $filteredValues[$key] = $this->uploadImage($bodyParams[$key]);
            }
        }
        return $filteredValues;
    }


    public function getSearchRequestParams($params,$filterParam){

        $filteredData = [];

        foreach ($filterParam as $key){
            if(isset($params[$key]) && !empty($params[$key] && !empty($params[$key][0]))){

                $filteredData[$key] = $params[$key];
            }
        }

        return $filteredData;

    }




}