<?php
namespace App\Service\ApiService;
use App\Repository\API\PartnerInterface;
use App\Helper\ApiDataUpdateHelper;

class PartnerImplementation implements PartnerService{

    private $partner;
    private $apiDataUpdateHelper;

    public function __construct(PartnerInterface $partner,ApiDataUpdateHelper $apiDataUpdateHelper)
    {
        $this->partner = $partner;
        $this->apiDataUpdateHelper = $apiDataUpdateHelper;
    }

//    public function assignedPartners($status){
//        $condition = [];
//        if(!empty($status)){
//            $condition[] =['trip_requests.status',$status] ;
//        }
//        return   $this->partner->assignedPartners($condition);
//
//    }

    public function updatePartnerDocument($data,$id){
        
       $docs =  $this->apiDataUpdateHelper->uploadUserDocuments($data, ['owner_national_id', 'owner_tin_certificate', 'owner_profile_picture']);
       return $this->partner->updatePartnerDocument($docs, $id);
    }


}