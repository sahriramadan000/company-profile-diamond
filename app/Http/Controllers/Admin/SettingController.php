<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class SettingController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'no_wa' => 'required|string|max:20',
        ]);

        DB::beginTransaction();

        try {
            // Ambil dan bersihkan nomor WA
            $noWa = $request->no_wa;
            // Hapus karakter +, spasi, -
            $noWa = str_replace(['+', ' ', '-'], '', $noWa);

            // Ganti angka awal 0 menjadi 62
            if (substr($noWa, 0, 1) === '0') {
                $noWa = '62' . substr($noWa, 1);
            }

            // Ambil row pertama atau buat baru
            $setting = Setting::first();
            $data = [
                'no_wa' => $noWa,
                'address' => $request->address,
                'hour_of_operation' => $request->hour_of_operation,
                'maps_link' => $request->maps_link,
            ];

            if ($setting) {
                $setting->update($data);
            } else {
                Setting::create($data);
            }

            DB::commit(); // commit jika berhasil
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack(); // rollback jika terjadi error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
}
