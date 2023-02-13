<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlatRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Http\Client\Request as ClientRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('id','DESC')->paginate(4);
        // return view('profile.dashboard')->with('menus',$menus);
        return view('dashboard' , ['menus'=>$menus]);
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
    public function store(Menu $menu ,PlatRequest $request)
    {
        $data = $request->validated();
        // dd($request->file('my_image'));
        // $input = $request->only(['dishTitle','my_image','description','dishDate']);
        // dd($input);
        // $data = [
        //     'name' => $request->input('name'),
        //     'image' => $request->file('image')->store('image','public'),
        //     'description' => $request->input('description'),
        //     'date' => $request->input('date'),
        // ];
        $data['image']=$request->file('image')->store('image','public');
        Menu::create($data);
        return redirect()->back()->with('flash_message','Dish Added!!');
        // return "yfct";
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



    public function welcome(){
        $menus = Menu::all();

        // return $menus;
        return view('welcome')->with('menus',$menus);
    }
}
