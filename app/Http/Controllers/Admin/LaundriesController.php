<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laundry;

class LaundriesController extends Controller
{
    public function index()
    {
        // すべての洗濯物データを取得（新しい順）
        $laundries = Laundry::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.laundries.index', compact('laundries'));
    }

    public function updateStatus(Request $request, $id)
    {
        // 洗濯物のステータス更新
        $laundry = Laundry::findOrFail($id);
        $laundry->status = $request->status;
        $laundry->save();

        return redirect()->route('admin.laundries')
        ->with('success', 'Status updated successfully!');
    }
}
