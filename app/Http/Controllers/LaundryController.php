<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\Tag;

class LaundryController extends Controller
{
    private $laundry;

    public function __construct(Laundry $laundry)
    {
        $this->laundry = $laundry;
    }

    public function create()
    {
        $tags = Tag::all(); // 全てのタグを取得
        return view('laundries.create', compact('tags'));
    }


    public function pickup()
    {
        return view('laundries.pickup');
    }

    public function store(Request $request)
    {
        // 6桁のランダムなピックアップコードを生成
        $pickupCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // 料金設定
        $basePrice = 4.00;  // 5kg以下の基本料金
        $extraPricePerUnit = 4.00; // 5kgごとの追加料金
        $unitSize = 5; // 1ユニット (kg)
        $tagPrice = 0.50; // タグ1つにつき $0.5
        $discountRate = 0.20; // 先生の割引率（20%）

        // 重量に応じた料金計算
        if ($request->units <= $unitSize) {
            $weightPrice = $basePrice;
        } else {
            $extraUnits = ceil($request->units / $unitSize) - 1; // 5kgごとの超過回数
            $weightPrice = $basePrice + ($extraUnits * $extraPricePerUnit);
        }

        // 選択されたタグ数を取得
        $selectedTags = $request->has('tags') ? count($request->tags) : 0;

        // タグ料金を計算
        $tagTotalPrice = $selectedTags * $tagPrice;

        // 合計料金を計算（重量料金 + タグ料金）
        $totalPrice = $weightPrice + $tagTotalPrice;

        // もし role が teacher なら 20% 割引
        if ($request->role === 'teacher') {
            $totalPrice *= (1 - $discountRate);
        }

        // 洗濯物のデータを保存
        $laundry = new Laundry();
        $laundry->user_name = $request->user_name;
        $laundry->role = $request->role;
        $laundry->units = $request->units;
        $laundry->pickup_code = $pickupCode; // 生成した6桁のコード
        $laundry->status = 'pending'; // デフォルトで "pending"
        $laundry->price = $totalPrice; // 計算した料金を保存
        $laundry->save();

        // 選択されたタグがあれば、紐付けを行う
        if ($request->has('tags')) {
            $laundry->tags()->sync($request->tags);
        }

        // 成功メッセージとピックアップコードを表示
        return redirect()->route('laundry.show', $laundry->id)
            ->with('success', 'Laundry application submitted successfully!')
            ->with('pickup_code', $pickupCode)
            ->with('total_price', number_format($totalPrice, 2)); // フォーマットして渡す
    }




    public function show($id)
    {
        $laundry = Laundry::findOrFail($id); // データを取得
        return view('laundries.show', compact('laundry')); // 変数を渡す
    }

    public function processPickup(Request $request)
    {
        $pickupCode = $request->pickup_code;

        // ピックアップコードに対応する洗濯物を検索
        $laundry = Laundry::where('pickup_code', $pickupCode)->first();

        // 該当するデータがない場合
        if (!$laundry) {
            return redirect()->route('laundry.pickup')
                ->with('error', 'Sorry, invalid pickup code. Please try again.');
        }

        // ステータスを "completed" に更新
        $laundry->status = 'completed';
        $laundry->save();

        // 受け取り完了メッセージを表示
        return redirect()->route('laundry.pickup')
            ->with('success', 'Thank you, ' . $laundry->user_name . '! Your laundry has been picked up!.');
    }
}
