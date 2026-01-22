<?php

namespace Modules\Aduan\Services;

use Modules\Aduan\Models\Aduan;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'selesai' => Aduan::where('status_aduan', 'Aduan Selesai')->count(),
            'penyidikan' => Aduan::where('status_aduan', 'Proses penyidikan')->count(),
            'diverifikasi' => Aduan::where('status_aduan', 'Sedang diverifikasi')->count(),
            'diproses' => Aduan::where('status_aduan', 'Sedang diproses')->count(),
            'ditolak' => Aduan::where('status_aduan', 'Aduan Ditolak')->count(),
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
            return ['message' => 'Aduan tidak ditemukan'];
        }

        $bukti = DB::table('bukti_aduan')
            ->where('id_aduan', $id)
            ->select('file_path', 'nama_file', 'jenis_file', 'ukuran')
            ->get();

        $aduan->bukti_aduan = $bukti;

        return $aduan;
    }

    public function search($kode_tiket)
    {
        $aduan = DB::table('aduan')
            ->join('kategori_aduan', 'aduan.id_kategori', '=', 'kategori_aduan.id_kategori')
            ->join('odp', 'aduan.id_unit', '=', 'odp.id_unit')
            ->select([
                'aduan.kode_tiket',
                'aduan.nama_kasus',
                'aduan.kronologi',
                'aduan.waktu_kejadian',
                'aduan.status_aduan',
                'aduan.created_at',
                'kategori_aduan.nama_kategori',
                'odp.nama_unit'
            ])
            ->where('aduan.kode_tiket', $kode_tiket)
            ->first();

        if (!$aduan) {
            return ['message' => 'Aduan tidak ditemukan'];
        }

        return $aduan;
    }


    public function create(array $data)
    {
        $user = Auth::user();
        $data['id_user'] = $user->id_user;
        $data['nama_pengadu'] = $this->generateAlias();
        $kodeTiket = 'ADU-' . strtoupper(Str::random(4)) . '-' .
             strtoupper(Str::random(4)) . '-' .
             strtoupper(Str::random(2));
        $data['kode_tiket'] = $kodeTiket;
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
