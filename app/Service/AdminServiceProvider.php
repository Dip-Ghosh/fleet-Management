<?php

namespace App\Service;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Service\Settings\AreaServiceInterface',
            'App\Service\Settings\AreaServiceImplementation'
        );
        $this->app->bind(
            'App\Service\Settings\LocationServiceInterface',
            'App\Service\Settings\LocationServiceImplementation'
        );
        $this->app->bind(
            'App\Service\Settings\CarTypeService',
            'App\Service\Settings\CarTypeServiceImplementation'
        );

        $this->app->bind(
            'App\Service\Settings\CarBrandService',
            'App\Service\Settings\CarBrandServiceImplementation'
        );
        $this->app->bind(
            'App\Service\Settings\CarModelService',
            'App\Service\Settings\CarModelServiceImplementation'
        );

        $this->app->bind(
            'App\Service\AdminService\AdminService',
            'App\Service\AdminService\AdminServiceImplementation'
        );
        $this->app->bind(
            'App\Service\GraphService\GraphService',
            'App\Service\GraphService\GraphServiceImplementation'
        );
        $this->app->bind(
            'App\Service\ApiService\RegistrationServiceApi',
            'App\Service\ApiService\RegistrationServiceApiImplementation'
        );
        $this->app->bind(
            'App\Service\ImageUploadService\ImageUploadServiceInterface',
            'App\Service\ImageUploadService\ImageUploadService'

        );
		$this->app->bind(
            'App\Service\Settings\TripTypeService',
            'App\Service\Settings\TripTypeServiceImplementation'
        );
        $this->app->bind(
            'App\Service\RoleService\RolePermissionService',
            'App\Service\RoleService\RolePermissionServiceImp'
        );
        $this->app->bind(
            'App\Service\Settings\PresetRemarkService',
            'App\Service\Settings\PresetRemarkServiceImplementation'
        );

        $this->app->bind(
            'App\Service\Settings\CallNoteService',
            'App\Service\Settings\CallNoteServiceImplementation'
        );

        $this->app->bind(
            'App\Service\ApiService\CallDetailsService',
            'App\Service\ApiService\CallDetailsImplementation'
        );

        $this->app->bind(
            'App\Service\ApiService\TripRemarksService',
            'App\Service\ApiService\TripRemarksImplementation'
        );

        $this->app->bind(
            'App\Service\ApiService\TripRequestService',
            'App\Service\ApiService\TripRequestServiceImplementation'
        );

        $this->app->bind(
            'App\Service\ApiService\PartnerInvitationService',
            'App\Service\ApiService\PartnerInvitationImplementation'
        );

        $this->app->bind(
            'App\Service\ApiService\TripRequestPickupTimeService',
            'App\Service\ApiService\TripRequestPickupTimeImplementation'
        );
     
        $this->app->bind(
            'App\Service\ApiService\TripRequestPointService',
            'App\Service\ApiService\TripRequestPointImplementation'
        );
        $this->app->bind(
            'App\Service\ApiService\PartnerService',
            'App\Service\ApiService\PartnerImplementation'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}