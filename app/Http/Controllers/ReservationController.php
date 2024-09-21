<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Facility;
use App\Models\Reservation;
use Database\Seeders\FacilitySeeder;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function confirm(Request $request)
{
    // 選択された施設と予約可能な時間を取得
    $facility = Facility::find($request->facility_id);

    // 予約可能な時間帯を設定（ここでは仮に10:00～20:00の1時間ごとの時間帯を作成）
    $availableTimes = [
        '10:00~11:00', '11:00~12:00', '12:00~13:00',
        '13:00~14:00', '14:00~15:00', '15:00~16:00',
        '16:00~17:00', '17:00~18:00', '18:00~19:00',
        
    ];

    // confirm.blade.phpに施設名と時間帯を渡す
    return view('reservations.confirm', compact('facility', 'availableTimes'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('reservations.index')->with('success', '予約が完了しました！');
    // バリデーション
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'time_slots' => 'required|array'
        ]);
    
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
