<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('admin', compact('contacts','categories'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')
                    ->CategorySearch($request->category_id)
                    ->GenderSearch($request->gender)
                    ->DateSearch($request->date)
                    ->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('admin', compact('contacts','categories'));
    }
}
