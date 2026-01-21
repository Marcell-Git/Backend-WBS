<?php

namespace Modules\Aduan\Services;

use Modules\Aduan\Models\Aduan;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AduanService
{
    protected function generateAlias(): string
    {
        do {
            $hewan = DB::table('hewan')->inRandomOrder()->value('nama');
            $aktivitas = DB::table('aktivitas')->inRandomOrder()->value('nama');
            $alias = "{$hewan} {$aktivitas}";
        } while (
            DB::table('aduan')->where('nama_pengadu', $alias)->exists()
        );

        return $alias;
    }

    public function getAll()
    {
        $Aduan = Aduan::paginate(10);
        return $Aduan;
    }

    public function getSummary()
    {
        return response()->json([
            'selesai' => Aduan::where('status_aduan', 'Selesai')->count(),
            'diproses' => Aduan::where('status_aduan', 'Sedang diproses')->count(),
            'diverifikasi' => Aduan::where('status_aduan', 'Sedang diverifikasi')->count(),
            'ditolak' => Aduan::where('status_aduan', 'Ditolak')->count(),
        ]);
    }


    public function showDetail($id)
    {
        $aduan = DB::table('aduan')
            ->join('kategori_aduan', 'aduan.id_kategori', '=', 'kategori_aduan.id_kategori')
            ->join('odp', 'aduan.id_unit', '=', 'odp.id_unit')
            ->select([
                'aduan.id_aduan',
                'aduan.nama_kasus',
                'aduan.kronologi',
                'aduan.nama_pengadu',
                'aduan.subjek_pelaku',
                'aduan.waktu_kejadian',
                'aduan.status_aduan',
                'aduan.created_at',
                'kategori_aduan.nama_kategori',
                'odp.nama_unit'
            ])
            ->where('aduan.id_aduan', $id)
            ->first();

        if (!$aduan) {
            return response()->json(['message' => 'Aduan tidak ditemukan'], 404);
        }

        $bukti = DB::table('bukti_aduan')
            ->where('id_aduan', $id)
            ->select('id_bukti_aduan', 'file_path')
            ->get();

        $aduan->bukti_aduan = $bukti;

        return response()->json($aduan);
    }


    public function create(array $data)
    {
        $user = Auth::user();
        $data['id_user'] = $user->id_user;
        $data['nama_pengadu'] = $this->generateAlias();
        return Aduan::create($data);
    }

    public function findById($id)
    {
        return Aduan::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->update([
            'nama_kasus' => $data['nama_kasus'],
            'kronologi' => $data['kronologi'],
            'nama_pengadu' => $data['nama_pengadu'],
            'subjek_pelaku' => $data['subjek_pelaku'],
            'waktu_kejadian' => $data['waktu_kejadian'],
            'status_aduan' => $data['status_aduan'],
            'id_kategori' => $data['id_kategori'],
            'id_unit' => $data['id_unit'],
            'id_user' => $data['id_user'],
        ]);
        return $aduan;
    }

    public function updateStatus($id, $status)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->update([
            'status_aduan' => $status,
        ]);
        return $aduan;
    }

    public function delete($id)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->delete();
        return $aduan;
    }
}
