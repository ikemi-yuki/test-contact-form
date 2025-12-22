<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email','tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        $category = Category::find($contact['category_id']);

        return view('confirm', compact('contact', 'genderText','category'));
    }

    public function store(Request $request)
    {
        $tel = $request->tel1 . $request->tel2 . $request->tel3;
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        $contact['tel'] = $tel;
        Contact::create($contact);

        return view('thanks');
    }

    public function edit(Request $request)
    {
        return redirect('/')->withInput($request->all());
    }
}
