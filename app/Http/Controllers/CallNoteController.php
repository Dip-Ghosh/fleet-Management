<?php

namespace App\Http\Controllers;

use App\Service\Settings\CallNoteService;
use Illuminate\Http\Request;
use App\Http\Requests\CallNotesValidationRequest;
class CallNoteController extends Controller
{

    protected $callNote;

    public function __construct(CallNoteService  $callNote)
    {
        $this->callNote = $callNote;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $callNotes = $this->callNote->all();
        
        return view('settings.callNotes.list',compact('callNotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.callNotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CallNotesValidationRequest $request)
    {
        $this->callNote->store($request->all());
        return redirect()->route('call-notes.index')->with('success','Call Note created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $callNote = $this->callNote->edit($id);
        return view('settings.callNotes.edit',compact('callNote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(CallNotesValidationRequest $request, $id)
    {
        $this->callNote->update($request->all(),$id);
        return redirect()->route('call-notes.index')->with('success','Call note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->callNote->delete($id);
        return redirect()->back()->with('success','Call Notes deleted Successfully');
    }
}
