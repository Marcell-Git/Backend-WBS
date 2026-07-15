<?php

namespace Modules\Aduan\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Aduan\Services\AduanService;
use Modules\BuktiAduan\Services\BuktiAduanService;
use Modules\Pelaku\Services\PelakuService;

class AduanController extends Controller
{
    protected $aduanService;
    protected $buktiAduanService;
    protected $pelakuService;

    public function __construct(AduanService $aduanService, BuktiAduanService $buktiAduanService, PelakuService $pelakuService)
    {
        $this->aduanService = $aduanService;
        $this->buktiAduanService = $buktiAduanService;
        $this->pelakuService = $pelakuService;
    }

    public function index(Request $request)
    {
        return $this->aduanService->getAll($request);
    }

    public function getSummary()
    {
        return $this->aduanService->getSummary();
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_kasus' => 'required|string|max:255',
                'kronologi' => 'required|string|min:10',
                'waktu_kejadian' => 'required|date',
                'id_kategori' => 'required|integer|exists:kategori_aduan,id_kategori',
                'pelaku' => 'required|array|min:1',
                'pelaku.*.nama' => 'required|string|max:255',
                'pelaku.*.jabatan' => 'required|string',
                'pelaku.*.id_unit' => 'required|integer|exists:odp,id_unit',
                'file' => 'required|array|min:1',
                'file.*' => 'file|mimes:jpg,jpeg,png,pdf|max:5120',
            ], [
                'file.required' => 'Bukti aduan wajib diunggah.',
                'file.array' => 'Bukti aduan harus berupa array.',
                'file.min' => 'Minimal harus mengunggah 1 file bukti aduan.',
                'file.*.file' => 'File yang diunggah harus berupa file yang valid.',
                'file.*.mimes' => 'Format file tidak didukung. Hanya boleh JPG, JPEG, PNG, atau PDF.',
                'file.*.max' => 'Ukuran file maksimal 5MB (5120KB). File yang diunggah terlalu besar.',
                'pelaku.required' => 'Data pelaku wajib diisi.',
                'pelaku.min' => 'Minimal harus ada 1 pelaku.',
                'pelaku.*.nama.required' => 'Nama pelaku wajib diisi.',
                'pelaku.*.jabatan.required' => 'Jabatan pelaku wajib diisi.',
                'pelaku.*.id_unit.required' => 'Unit kerja pelaku wajib diisi.',
                'pelaku.*.id_unit.exists' => 'Unit kerja yang dipilih tidak valid.',
                'id_kategori.required' => 'Kategori aduan wajib dipilih.',
                'id_kategori.exists' => 'Kategori aduan yang dipilih tidak valid.',
                'nama_kasus.required' => 'Nama kasus wajib diisi.',
                'kronologi.required' => 'Kronologi kejadian wajib diisi.',
                'kronologi.min' => 'Kronologi kejadian minimal 10 karakter.',
                'waktu_kejadian.required' => 'Waktu kejadian wajib diisi.',
                'waktu_kejadian.date' => 'Format waktu kejadian tidak valid.',
            ]);

            $dataAduan = $request->except(['file', 'pelaku']);

            $aduan = $this->aduanService->create($dataAduan);

            foreach ($validated['pelaku'] as $pelakuData) {
                $this->pelakuService->create($pelakuData, $aduan->id_aduan);
            }

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
                'data' => $aduan->load('pelaku', 'buktiAduan')
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal membuat aduan',
                'errors' => ['server' => [$e->getMessage()]]
            ], 500);
        }
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

    public function search($kode_tiket)
    {
        $aduan = $this->aduanService->search($kode_tiket);

        return response()->json([
            'message' => 'Pencarian Aduan berhasil',
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
