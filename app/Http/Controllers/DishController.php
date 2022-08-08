<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dish.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $type_dish = Dish::all();
        $type_dish = DB::table('dish_type')
                ->get();
        $org = DB::table('organizations')
                ->get();  
        return view('dish.add', compact('type_dish','org'));
        /* $type_org1 = DB::table('dish_type')
                ->get();

        dd($type_org1); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'          =>  'required',
            // 'icno'          =>  'required',
            'price'         =>  'required',
            'dish_image'         =>  'required',
            'organ_id'  =>  'required',
            'dish_type'  =>  'required'
        ]);
        
        $newdish = new Dish([
            'name'           =>  $request->get('name'),
            // 'icno'           =>  $request->get('icno'),
            'email'          =>  $request->get('email'),
            'password'       =>  Hash::make('abc123'),
            'telno'          =>  $request->get('telno'),
            'remember_token' =>  $request->get('_token'),
            // 'created_at'     =>  now(),
        ]);
        $newdish->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
<<<<<<< HEAD
=======



    //to get all dishes of a certain organization
    public function getDishByOrgId($id)
    {
        return DB::table('dishes')
            ->where('organ_id', $id)
            ->get();
    }

    //to get date available based on dish id
    public function getDateByDishId($id)
    {
        return DB::table('dish_available')
            ->where('dish_id', $id)
            ->where('date', '>=', DB::raw('curdate()'))
            ->select('date')
            ->get();
    }

    //to get all data in dish_available table
    public function getAllDishAvailable()
    {
        return DB::table('dish_available')
            ->select()
            ->get();
    }
>>>>>>> main
}
