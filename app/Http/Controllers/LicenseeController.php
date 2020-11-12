<?php

namespace App\Http\Controllers;

use App\Models\Licensee;
use App\Models\Product;
use Illuminate\Http\Request;

class LicenseeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $licensees = Licensee::latest()->paginate(5);
        // $licenseeProducts=$licensees->products();
        $licensees = Licensee::with('products')->get();

        return view('licensees.index', array('licensees' => $licensees));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('licensees.create', array('products' => $products));
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
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|min:4',


        ]);
        // $licensee = Licensee::create($request->all());
        $licensee = new Licensee();
        $licensee->username = $request->username;
        $licensee->email = $request->email;
        $licensee->password = $request->password;

        $licensee->save();

        $licensee->products()->attach($request->products);


        return redirect()->route('licensees.index')
            ->with('success', 'Product created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Licensee $licensee)
    {
        $licensee = Licensee::with('products')->findOrFail($licensee->id);

        return view('licensees.show', compact('licensee'));
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
    public function destroy(Licensee $licensee)
    {
        $licensee->delete();
         return redirect()->route('licensees.index')->with('success','Licensee deleted successfully');
    }
}
