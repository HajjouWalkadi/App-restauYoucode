<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        // return view('profile.dashboard')->with('menus',$menus);
        return view('dashboard')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Menu $menu ,Request $request)
    {
        // dd($request->file('my_image'));
        // $input = $request->only(['dishTitle','my_image','description','dishDate']);
        // dd($input);
        $data = [
            'name' => $request->input('name'),
            'image' => $request->file('image')->store('image','public'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ];
        Menu::create($data);
        return redirect()->back()->with('flash_message','Dish Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::find($id);
        return view('/edit')->with('menus', $menus);
        // return redirect('/dashboard');
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
        // dd($request->input('name'));
        // $input = $request->only(['name','image','description','date']);
        // dd($input);

        $data = [
            'name' => $request->input('name'),
            'image' => $request->file('image')->store('image','public'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ];
        Menu::where('id', $id)->update($data);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menus = Menu::find($id);
        $menus->delete();
        return redirect('/dashboard');
    }
}
