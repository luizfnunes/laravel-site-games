<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Rules\ValidVideo;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        //
        $maxResults = 12;
        $limit = $maxResults; 
        $offset = (intval($page) - 1) * $maxResults;
        $countResults = Game::count();
        $pages = intdiv($countResults, $maxResults) == 0 ? 1 : intdiv($countResults, $maxResults) + ($countResults % $maxResults);
        $games = Game::offset($offset)->limit($limit)->get();
        $data = [
            "countResults" => $countResults,
            "page"       => $page,
            "pages"      => $pages,
            "games"      => $games
        ];
        return view('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name"         => "required",
            "release_date" => "required|date_format:m-d-Y",
            "video"        => ["required", new ValidVideo],
            "price"        => "required|regex:/^\d+(\.\d{1,2})?$/",
            "description"  => "required",
            "image"        => "required|mimes:jpg,png,jpeg|dimensions:width=600,height=900",
        ]);
        try {
            $convertDate = explode("-",$request->release_date);
            $convertDate = $convertDate[2]."-".$convertDate[0]."-".$convertDate[1];
            $game = new Game;
            $game->name = $request->name;
            $game->release_date = $convertDate;
            $game->video = $request->video;
            $game->price = $request->price;
            $game->description = $request->description;
            $game->image = $request->file('image')->store('games', 'public');
            $game->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',"An error has occurred!");
        }
        return redirect()->route('dashboard.index')->with('success','Game saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $game = Game::findOrFail($id);
        } catch (\Throwable $th) {
            abort(404);
        }
        return view('game', ["game" => $game]);
    }

    /**
     * Display the list from games.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list($page = 1)
    {
        $maxResults = 12;
        $limit = $maxResults; 
        $offset = (intval($page) - 1) * $maxResults;
        $countResults = Game::count();
        $pages = intdiv($countResults, $maxResults) == 0 ? 1 : intdiv($countResults, $maxResults) + ($countResults % $maxResults);
        $games = Game::offset($offset)->limit($limit)->get();
        $data = [
            "countResults" => $countResults,
            "page"       => $page,
            "pages"      => $pages,
            "games"      => $games
        ];
        return view('dashboard.index', $data);
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
        try {
            $game = Game::findOrFail($id);
            return view("dashboard.edit", ["game" => $game]);
        } catch (\Throwable $th) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $game = Game::findOrFail($request->id);
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.index');
        }
        $custonMessage = [
            "image.required_if" => "The image field is required when the button 'change image' is marked."
        ];
        $this->validate($request, [
            "changeImage"  => "required",
            "name"         => "required",
            "release_date" => "required|date_format:m-d-Y",
            "video"        => ["required", new ValidVideo],
            "price"        => "required|regex:/^\d+(\.\d{1,2})?$/",
            "description"  => "required",
            "image"        => "required_if:changeImage,==,1|mimes:jpg,png,jpeg|dimensions:width=600,height=900",
        ], $custonMessage);
        try{
            $oldImage = $game->image;
            $convertDate = explode("-",$request->release_date);
            $convertDate = $convertDate[2]."-".$convertDate[0]."-".$convertDate[1];
            $game->name = $request->name;
            $game->release_date = $convertDate;
            $game->video = $request->video;
            $game->price = $request->price;
            $game->description = $request->description;
            if($request->changeImage == 1){
                Storage::delete($oldImage);
                $game->image = $request->file('image')->store('games', 'public');
            }
            $game->save();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',"An error has occurred!");
        }
        return redirect()->route('dashboard.index')->with('success','Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $game = Game::findOrFail($request->id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error',"Game not Found!");
        }
        $image = $game->image;
        Storage::delete($image);
        $game->delete();
        return redirect()->back()->with('success',"Game deleted successfully!");
    }
}
