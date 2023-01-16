<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $tracks = Track::where('name','LIKE',"%$search%")->
            orWhere('artist','LIKE',"%$search%")->
            get();
        }
        else
        {
            $tracks = Track::all();
        }

        return view('tracks.index',compact('tracks'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'artist' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $track_data = [
            'name' => $request->input('name'),
            'artist' => $request->input('artist'),
            'album' => $request->input('album'),
            'track_link' => $request->input('track_link'),
            'user_id'=> Auth::id(),

        ];

        if($request->hasFile('image'))
        {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('images/',$fileName);

        }
        $track_data = [
            'name' => $request->input('name'),
            'artist' => $request->input('artist'),
            'album' => $request->input('album'),
            'track_link' => $request->input('track_link'),
            'user_id'=> Auth::id(),
            'cover_path' => $fileName
        ];



        Track::create($track_data);

        return redirect()->route('tracks.index')
            ->with('success','Track created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show($track)
    {
        $track = Track::with('comments.user')->find($track);

        return view('tracks.show',compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('tracks.edit',compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        if (auth()->user()->id === $track->user_id) {
            $track->update($request->all());

            return redirect()->route('tracks.index')
                ->with('success','Track updated successfully');
        }

        $track->update($request->all());

        return redirect()->route('tracks.index')
            ->with('failure','Failed to delete track');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        if (auth()->user()->id === $track->user_id) {
            $track->delete();

            return redirect()->route('tracks.index')
                ->with('success','Product deleted successfully');
        }

        return redirect()->route('tracks.index')
            ->with('failure','Unable to delete track');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

}
