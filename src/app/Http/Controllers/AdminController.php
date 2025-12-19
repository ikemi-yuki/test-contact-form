<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);
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
                    ->categorySearch($request->category_id)
                    ->genderSearch($request->gender)
                    ->dateSearch($request->date)
                    ->keywordSearch($request->keyword)
                    ->paginate(7)
                    ->withQueryString();
        $categories = Category::all();

        return view('admin', compact('contacts','categories'));
    }
}
