<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Service\Settings\AreaServiceInterface;
use App\Service\Settings\LocationServiceInterface;
use App\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    private $area;
    private $city;

    public function __construct(AreaServiceInterface $area,LocationServiceInterface $city)
    {
        $this->area = $area;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->area->all();
        return view('settings.areas.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $locations =  $this->city->all();
        return view('settings.areas.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AreaRequest $request)
    {
        $this->area->store($request->all());
        return redirect()->route('areas.index')->with('success','Area created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->area->edit($id);
        $locations = $this->city->all();
        return view('settings.areas.edit',compact('data','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AreaRequest $request, $id)
    {
        $this->area->update($request->all(),$id);
        return redirect()->route('areas.index')->with('success','Area  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->area->delete($id);
        return redirect()->back()->with('success','Area deleted Successfully');

    }

}
