<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripTypeValidationRequest;
use App\Service\Settings\TripTypeService;


class TripTypeController extends Controller
{

    protected $tripType;

    public function __construct(TripTypeService  $tripType)
    {
        $this->tripType = $tripType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $tripTypes = $this->tripType->all();

        return view('settings.tripTypes.list',compact('tripTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.tripTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TripTypeValidationRequest $request)
    {
        $this->tripType->store($request->all());
        return redirect()->route('trip-types.index')->with('success','Trip Type created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tripType = $this->tripType->edit($id);
        return view('settings.tripTypes.edit',compact('tripType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(TripTypeValidationRequest $request, $id)
    {
        $this->tripType->update($request->all(),$id);
        return redirect()->route('trip-types.index')->with('success','Trip type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->tripType->delete($id);
        return redirect()->back()->with('success','Trip Type deleted Successfully');
    }
}
