<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Facility;
use App\Models\Report;
use App\Models\Reservation;
use App\Models\ReservationStatusHistory;
use Database\Seeders\FacilitySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function initial()
    {
        // 初期画面表示し、ログインかユーザー登録を行う
        return view('reservations.initial');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $facilities = Facility::all();
        // 必要なデータを取得し、予約作成画面を返す
        return view('reservations.create', compact('facilities'));
    }
    // 予約内容確認画面
    public function complete()
    {
        // 予約完了ページを表示
        return view('reservations.complete');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        // バリデーション（施設IDと予約日時のみを検証）
        // $validated = $request->validate([
        //     'facility_id' => 'required|exists:facilities,id',  // 施設IDが存在するか確認
        //     'reservation_datetime' => 'required|date',  // 正しい日付フォーマットか確認
        //     'time_slots' => 'required|array|min:1', // 少なくとも1つは選択されているかチェック
        //     'time_slots.*' => 'in:9:00~10:00,10:00~11:00,11:00~12:00,12:00~13:00,13:00~14:00,14:00~15:00,15:00~16:00,17:00~18:00,18:00~19:00,19:00~20:00,20:00~21:00',
        // ]);

        // トランザクションを使ってデータ保存
        DB::beginTransaction();
        try {
            // 予約を保存
            // $reservation = new Reservation();
            // $reservation->facility_id = $validated['facility_id'];
            // $reservation->reservation_datetime = $validated['reservation_datetime'];
            // $reservation->user_id = auth()->id();  // ログインしているユーザーIDを取得
            // // dd($validated['time_slots']);
            // $reservation->time_slot = $validated['time_slot'];
            // $reservation->save();  // 予約データを保存

            $reservation = new Reservation();
            $reservation->facility_id = $request->facility_id;
            $reservation->reservation_datetime = $request->reservation_datetime;
            $reservation->user_id = auth()->id();  // ログインしているユーザーIDを取得
            // dd($validated['time_slots']);
            $reservation->time_slot = $request->time_slot;
            $reservation->save();  // 予約データを保存


            // ReservationStatusHistoryに保存する必要がある場合
            // $history = new ReservationStatusHistory();
            //$history->reservation_id = $reservation->id;  // 保存された予約のIDを保存
            //$history->user_id = auth()->id();  // ログインしているユーザーのIDを保存
            //$history->status = '予約完了';  // ステータスを設定
            //$history->save();  // 履歴データを保存

            DB::commit();  // トランザクションの確定
        } catch (\Exception $e) {
            DB::rollback();  // エラー時にトランザクションをロールバック
            return back()->withInput()->withErrors($e->getMessage());
        }

        // 予約完了ページへリダイレクト
        return redirect()->route('reservations.complete')->with('success', '予約が完了しました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }
}
