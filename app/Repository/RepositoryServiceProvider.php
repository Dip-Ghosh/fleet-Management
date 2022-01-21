<?php

namespace App\Repository;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\API\RegisterInterface',
            'App\Repository\API\RegisterRepository'
        );
        $this->app->bind(
            'App\Repository\Backend\AdminInterface',
            'App\Repository\Backend\AdminRepository'
        );
        $this->app->bind(
            'App\Repository\Backend\GraphInterface',
            'App\Repository\Backend\GraphRepository'
        );
        $this->app->bind(
            'App\Repository\Setting\LocationInterface',
            'App\Repository\Setting\LocationRepository'
        );
        $this->app->bind(
            'App\Repository\Setting\CarTypeInterface',
            'App\Repository\Setting\CarTypeRepository'
        );

        $this->app->bind(
            'App\Repository\Setting\TripTypeInterface',
            'App\Repository\Setting\TripTypeRepository'
        );
        $this->app->bind(
            'App\Repository\Setting\CarBrandInterface',
            'App\Repository\Setting\CarBrandRepository'
        );
        $this->app->bind(
            'App\Repository\Setting\CarModelInterface',
            'App\Repository\Setting\CarModelRepository'
        );
        $this->app->bind(
            'App\Repository\Setting\AreaInterface',
            'App\Repository\Setting\AreaRepository'
        );
		$this->app->bind(
            'App\Repository\Setting\TripTypeInterface',
            'App\Repository\Setting\TripTypeRepository'
        );

        $this->app->bind(
            'App\Repository\Role\RoleInterface',
            'App\Repository\Role\RoleRepository'
        );
        $this->app->bind(
            'App\Repository\Setting\PresetRemarkInterface',
            'App\Repository\Setting\PresetRemarkRepository'
        );

        $this->app->bind(
            'App\Repository\Setting\CallNoteInterface',
            'App\Repository\Setting\CallNoteRepository'
        );

        $this->app->bind(
            'App\Repository\API\CallDetailsInterface',
            'App\Repository\API\CallDetailsRepository'
        );

        $this->app->bind(
            'App\Repository\API\TripRemarksInterface',
            'App\Repository\API\TripRemarksRepository'
        );
           
        $this->app->bind(
            'App\Repository\API\TripRequestInterface',
            'App\Repository\API\TripRequestRepository'
        );

        $this->app->bind(
            'App\Repository\API\PartnerInvitationInterface',
            'App\Repository\API\PartnerInvitationRepository'
        );
        
        $this->app->bind(
            'App\Repository\API\TripRequestPickupTimeInterface',
            'App\Repository\API\TripRequestPickupTimeRepository'
        );
        
        $this->app->bind(
            'App\Repository\API\TripRequestPointInterface',
            'App\Repository\API\TripRequestPointRepository'
        );

        $this->app->bind(
            'App\Repository\API\PartnerInterface',
            'App\Repository\API\PartnerRepository'
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
