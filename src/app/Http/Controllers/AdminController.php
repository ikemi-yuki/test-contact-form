<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    public function export(Request $request)
    {
        $contacts = Contact::with('category')
                    ->categorySearch($request->category_id)
                    ->genderSearch($request->gender)
                    ->dateSearch($request->date)
                    ->keywordSearch($request->keyword)
                    ->get();

        return new StreamedResponse(function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'お名前',
                '性別',
                'メールアドレス',
                '電話番号',
                '住所',
                '建物名',
                'お問い合わせの種類',
                'お問い合わせ内容',
            ]);

            $genderLabels = [
                1 => '男性',
                2 => '女性',
                3 => 'その他',
            ];

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    $genderLabels[$contact->gender],
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    $contact->category->content,
                    $contact->detail,
                ]);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);
    }
}
