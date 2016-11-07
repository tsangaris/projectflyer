<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\FlyerRequest;

use App\Flyer;

use App\Photo;

class FlyersController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

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
      $flyer = Flyer::locatedAt($zip, $street);

      return view('flyers.show', compact('flyer'));
    }

    /**
    * Apply the photo to the referenced flyer
    * @param string $zip
    * @param string $street
    * @param Request $request
    */
    public function addPhoto($zip, $street, Request $request)
    {

      $this->validate($request , [
        'photo' => 'required|mimes:jpg,jpeg,png'
      ]);

      $photo = Photo::fromForm($request->file('photo'));

      Flyer::locatedAt($zip, $street)->addPhoto($photo);

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
