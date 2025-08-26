<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportantNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportantNoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'important_notes' => 'required|array',
            'important_notes.*' => 'required|string',
        ]);

        try {
            DB::transaction(function () use ($request) {
                ImportantNote::query()->delete();

                foreach ($request->important_notes as $note) {
                    ImportantNote::create([
                        'note' => $note
                    ]);
                }
            });

            return redirect()->back()->with('success', 'Keterangan penting berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
