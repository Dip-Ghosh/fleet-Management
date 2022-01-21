<?php

namespace App\Http\Controllers;
use App\Service\Settings\PresetRemarkService;
use Illuminate\Http\Request;
use App\Http\Requests\PresetRemarkValidationRequest;
class PresetRemarkController extends Controller
{
    protected $presetRemarkService;

    public function __construct(PresetRemarkService  $presetRemarkService)
    {
        $this->presetRemarkService = $presetRemarkService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $remarks = $this->presetRemarkService->all();

        return view('settings.presetRemark.list',compact('remarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.presetRemark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @oaram preset_remark_type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PresetRemarkValidationRequest $request)
    {
        $this->presetRemarkService->store($request->all());
        return redirect()->route('preset-remarks.index')->with('success','Remarks created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     * @param id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $remark = $this->presetRemarkService->edit($id);
        return view('settings.presetRemark.edit',compact('remark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param preset_remark_type
     * @return \Illuminate\Http\Response
     */
    public function update(PresetRemarkValidationRequest $request, $id)
    {
        $this->presetRemarkService->update($request->all(),$id);
        return redirect()->route('preset-remarks.index')->with('success','Preset Remark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->presetRemarkService->delete($id);
        return redirect()->back()->with('success','Preset Remark deleted Successfully');
    }
}
