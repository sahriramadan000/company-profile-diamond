<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'no_wa' => 'required|string|max:20',
            'ads_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        DB::beginTransaction();

        try {
            // Ambil dan bersihkan nomor WA
            $noWa = $request->no_wa;
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

            // Jika ada upload gambar
            if ($request->hasFile('ads_image')) {
                $file = $request->file('ads_image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $path = public_path('assets/img/iklan/' . $filename);

                $manager = new ImageManager(
                    driver: new Driver()
                );

                $image = $manager->read($file);
                $image->save($path, quality: 80);

                // Jika ada gambar lama, hapus dulu
                if ($setting && $setting->ads_image) {
                    $oldPath = public_path('assets/img/iklan/' . $setting->ads_image);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // Simpan path baru ke database
                $data['ads_image'] = $filename;
            }

            if ($setting) {
                $setting->update($data);
            } else {
                Setting::create($data);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
}
