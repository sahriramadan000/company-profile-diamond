<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoldPrice;
use App\Models\ImportantNote;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class GoldPriceController extends Controller
{
    // Tampilkan halaman admin
    public function index()
    {
        $goldPrices = GoldPrice::all();
        $importantNotes = ImportantNote::all();
        $setting  = Setting::first();

        if ($goldPrices->isEmpty()) {
            $goldPrices = [
                (object)[
                    'weight' => '',
                    'base_price' => '',
                    'price_pph' => ''
                ]
            ];
        }

        if ($importantNotes->isEmpty()) {
            $importantNotes = [
                (object)[
                    'note' => '',
                ]
            ];
        }

        return view('front-view.admin.index', compact('goldPrices', 'importantNotes', 'setting'));
    }

    // Simpan / update harga emas
    public function store(Request $request)
    {
        $weights = $request->input('weight', []);
        $basePrices = $request->input('base_price', []);
        $pricePphs = $request->input('price_pph', []);

        DB::beginTransaction(); // Mulai transaction
        try {

            // Hapus semua data lama (opsional)
            GoldPrice::query()->delete();

            foreach ($weights as $i => $weight) {
                if ($weight != '') {
                    $basePrice = isset($basePrices[$i]) ? str_replace([',', '.'], '', $basePrices[$i]) : 0;
                    $pricePph = isset($pricePphs[$i]) ? str_replace([',', '.'], '', $pricePphs[$i]) : 0;
                    GoldPrice::create([
                        'weight' => $weight,
                        'base_price' => $basePrice,
                        'price_pph' => $pricePph,
                    ]);
                }
            }

            DB::commit(); // Commit transaction jika semua berhasil
            return redirect()->route('admin')->with('success', 'Data harga emas berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi error
            return redirect()->route('admin')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
}
