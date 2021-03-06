<?php

namespace App\Http\Controllers;

use App\Materials;
use Faker\Provider\ka_GE\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mat = Materials::all();

        foreach ($mat as $m){
            $m['cond'] = false;
            if ($m['restock_qty'] >= $m['current_qty']){
                $m['cond'] = true;
            }
        }
        return view('material')
            ->with('materials',$mat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maty = new Materials();
        $maty->carID = null;
        $maty->name = $request->matname;
<<<<<<< Updated upstream
        $maty->restock_qty = $request->restock_qty;
=======
        $maty->restock_qty = $request->matrestock_qty;
>>>>>>> Stashed changes
        $maty->current_qty = $request->matcurrent_qty;
        $maty->status = "Sufficient";
        $maty->created_at = Date('Y-m-d');
        $maty->updated_at = now();
        $maty->price = $request->price;
        $maty->save();
        Session::flash('success_create','Successfully added a fucking supplier!');
        return redirect('/materials');
    }

    /***
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
