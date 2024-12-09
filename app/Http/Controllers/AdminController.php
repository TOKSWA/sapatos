<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function product()
    {
        return view ('admin.product');
    }

    public function uploadproduct(Request $request)
    {

        $data=new product;

        $image=$request->file;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->file->move('productimage',$imagename);

        $data->image=$imagename;

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->des;

        $data->quantity=$request->quantity;

        $data->save();

        return redirect()->back()->with('message','Product Added Succesfully');

    }
    public function showproduct()
    {
        $data = Product::all();

        // Pass the data to the view
        return view('admin.showproduct', compact('data'));
    }

    public function deleteproduct($id)
    {

        $data=Product::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product Deleted');;

    }

    public function updateview($id)
    {

        $data=Product::find($id);
        return view('admin.updateview',compact('data'));

    }

    public function updateproduct(Request $request, $id)
{
    // Find the product
    $data = Product::find($id);

    // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
        'des' => 'required|string',
        'quantity' => 'required|integer',
        'file' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update fields
    $data->title = $request->title;
    $data->price = $request->price;
    $data->description = $request->des;
    $data->quantity = $request->quantity;

    // Update the image if a new one is provided
    if ($request->hasFile('file')) {
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);
        $data->image = $imagename;
    }

    // Save the product
    $data->save();

    // Redirect back with success message
    return redirect()->back()->with('message', 'Product Updated Successfully');
}


}
