<?php

namespace Modules\Aduan\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Aduan\Services\AduanService;
use Modules\BuktiAduan\Services\BuktiAduanService;

class AduanController extends Controller
{
    protected $aduanService;
    protected $buktiAduanService;
    public function __construct(AduanService $aduanService, BuktiAduanService $buktiAduanService)
    {
        $this->aduanService = $aduanService;
        $this->buktiAduanService = $buktiAduanService;
    }

    public function index()
    {
        return $this->aduanService->getAll();
    }

    public function getSummary()
    {
        return $this->aduanService->getSummary();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kasus' => 'required|string|max:255',
            'kronologi' => 'required|string',
            'subjek_pelaku' => 'required|string|max:255',
            'waktu_kejadian' => 'required|date',
            'id_kategori' => 'required|integer',
            'id_unit' => 'required|integer',
            'file' => 'required|array',
            'file.*' => 'file|mimes:jpg,jpeg,png,pdf'
        ]);

        $aduan = $this->aduanService->create(
            $request->except('file')
        );

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $this->buktiAduanService->store(
                    $aduan->id_aduan,
                    $file
                );
            }
        }
        return response()->json([
            'message' => 'Aduan berhasil dibuat',
            'data' => $aduan->load('buktiAduan')
        ], 201);
    }


    public function show($id)
    {
        $aduan = $this->aduanService->findById($id);

        return response()->json([
            'message' => 'Data Aduan berhasil diambil',
            'data' => $aduan
        ]);
    }

    public function showDetail($id)
    {
        $aduan = $this->aduanService->showDetail($id);

        return response()->json([
            'message' => 'Detail Aduan berhasil diambil',
            'data' => $aduan
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $aduan = $this->aduanService->update($id, $data);

        return response()->json([
            'message' => 'Aduan berhasil diperbarui',
            'data' => $aduan
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_aduan' => 'required|string|max:255',
        ]);

        $data = $request->only('status_aduan');
        $aduan = $this->aduanService->updateStatus($id, $data['status_aduan']);

        return response()->json([
            'message' => 'Status Aduan berhasil diperbarui',
            'data' => $aduan
        ]);
    }

    public function destroy($id)
    {
        $aduan = $this->aduanService->delete($id);

        return response()->json([
            'message' => 'Aduan berhasil dihapus',
            'data' => $aduan
        ]);
    }
}