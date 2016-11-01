<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FlyerRequest;

use App\Flyer;

class FlyersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show create flyer page
        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\FlyerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        //persist the flyer
        Flyer::create($request->all());

        //show the flash message
        flash()->success('Success!', 'The flyer is added successfully');

        //redirect back to the form
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param   int  $zip
     * @param   text $street
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
      $flyer = Flyer::locatedAt($zip, $street)->first();

      return view('flyers.show', compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
