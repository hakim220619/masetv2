<?php

namespace App\Http\Controllers\Object;

use App\Http\Controllers\Controller;
use App\Models\Bangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ObjectController extends Controller
{
    public function lihat_object()
    {
        // Kita akan menampilkan view saja, data akan diambil melalui AJAX
        return view('content.object.lihat_object');
    }

    public function list_objects(Request $request)
    {
        $query = Bangunan::query();

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_bangunan', 'like', "%{$search}%")
                    ->orWhere('jenis_bangunan', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan tipe objek jika ada
        if ($request->has('type') && !empty($request->type)) {
            $query->where('jenis_bangunan', $request->type);
        }

        // Hitung total data untuk pagination
        $total = $query->count();

        // Pagination - 6 items per page
        $page = $request->input('page', 1);
        $perPage = 6;

        $data = $query->orderBy('created_at', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        // Pastikan data yang dikembalikan memiliki semua field yang diperlukan
        $data = $data->map(function ($item) {
            // Pastikan semua field yang digunakan di frontend tersedia
            return [
                'id' => $item->id,
                'nama_bangunan' => $item->nama_bangunan,
                'jenis_bangunan' => $item->jenis_bangunan,
                'alamat' => $item->alamat,
                'created_at' => $item->created_at->format('d-m-Y'),
                'foto_depan' => $item->foto_depan ?? 'default.jpg',
                'status_data' => $item->status_data ?? 'Aktif'
            ];
        });

        return response()->json([
            'data' => $data,
            'total' => $total,
            'current_page' => (int)$page,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage)
        ]);
    }
}
