<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kecamatan = Kecamatan::all();
        $data = [
            'header_name' => "Data Kecamatan",
            'page_name' => "Daftar Kecamatan"
        ];

        if ($request->is('api/*')) {
            // Request dari API
            if ($kecamatan->isEmpty()) {
                return response()->json([
                    'code' => Response::HTTP_NOT_FOUND,
                    'message' => 'Tidak ada data kecamatan',
                    'data' => null
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'message' => 'Data kecamatan berhasil dimuat.',
                    'data' => $kecamatan,
                ], Response::HTTP_OK);
            }
        } else {
            return view('pages.data_kecamatan.index', compact('kecamatan', 'data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'header_name' => "Data Kecamatan",
            'page_name' => "Tambah Data Kecamatan"
        ];

        return view('pages.data_kecamatan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            if (isset($data[0]) && is_array($data[0])) {
                // Handling multiple data entries
                $validatedData = $request->validate([
                    '*.id_kecamatan' => 'nullable',
                    '*.id_kabupaten' => 'nullable',
                    '*.name' => 'required',
                ]);

                $kecamatanArray = [];

                foreach ($validatedData as $entry) {
                    $kecamatan = Kecamatan::create([
                        'id_kecamatan' => $entry['id_kecamatan'],
                        'id_kabupaten' => $entry['id_kabupaten'],
                        'name' => $entry['name']
                    ]);

                    $kecamatanArray[] = $kecamatan;
                }
            } else {
                // Handling single data entry
                $validatedData = $request->validate([
                    'id_kecamatan' => 'nullable',
                    'id_kabupaten' => 'nullable',
                    'name' => 'required',
                ]);

                $kecamatan = Kecamatan::create([
                    'id_kecamatan' => $validatedData['id_kecamatan'],
                    'id_kabupaten' => $validatedData['id_kabupaten'],
                    'name' => $validatedData['name']
                ]);

                $kecamatanArray = [$kecamatan];
            }

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data kecamatan berhasil ditambahkan',
                    'data' => $kecamatanArray,
                ], Response::HTTP_OK);
            } else {
                Session::flash('success', 'Data kecamatan berhasil ditambahkan');
                return redirect()->route('data-kecamatan.index');
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menambahkan data kecamatan baru',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal menambahkan data kecamatan baru ' . $e->getMessage());
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id_kecamatan, Request $request)
    {
        $data_kecamatan = Kecamatan::firstWhere('id_kecamatan', $id_kecamatan);

        $data = [
            'header_name' => "Data Kecamatan",
            'page_name' => "Detail data kecamatan " . $data_kecamatan->name
        ];

        if ($request->is('api/*')) {
            if ($data_kecamatan) {
                return response()->json([
                    'data' => $data_kecamatan,
                    'message' => 'Data data_kecamatan (' . $data_kecamatan->name . ') berhasil dimuat.',
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'data' => null,
                    'message' => "Data dengan id " . $id_kecamatan . " tidak tersedia",
                ], Response::HTTP_NOT_FOUND);
            }
        } else {
            return view('pages.data_kecamatan.read', compact('data_kecamatan', 'data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_kecamatan)
    {
        try {
            $data_kecamatan = Kecamatan::where('id_kecamatan', $id_kecamatan)->firstOrFail();
            $data = [
                'header_name' => "Data Kecamatan",
                'page_name' => "Edit Data Kecamatan " . $data_kecamatan->name
            ];
            return view('pages.data_kecamatan.edit', compact('data_kecamatan', 'data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data kecamatan ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_kecamatan)
    {
        try {
            $data_kecamatan = Kecamatan::where('id_kecamatan', $id_kecamatan)->first();

            $validatedData = $request->validate([
                'name' => 'required',
            ]);

            $data_kecamatan->where('id_kecamatan', $id_kecamatan)->update([
                'name' => $validatedData['name'],
            ]);

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data kecamatan (' . $data_kecamatan->name . ') berhasil diubah',
                    'data' => $data_kecamatan,
                ], Response::HTTP_OK);
            } else {
                Session::flash('success', 'Data kecamatan (' . $data_kecamatan->name . ') berhasil diubah');
                return redirect()->route('data-kecamatan.show', ['data_kecamatan' => $data_kecamatan->id_kecamatan]);
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memperbarui data kecamatan.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal memperbarui data kecamatan. ' . $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_kecamatan, Request $request)
    {
        try {
            $data_kecamatan = Kecamatan::where('id_kecamatan', $id_kecamatan)->first();

            // Soft delete data
            $data_kecamatan->where('id_kecamatan', $id_kecamatan)->delete();

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data kecamatan (' . $data_kecamatan->name . ') dipindahkan ke kotak sampah (trash)',
                ], Response::HTTP_OK);
            } else {
                return redirect()->route('data-kecamatan.index')->with('success', 'Data kecamatan (' . $data_kecamatan->name . ') dipindahkan ke kotak sampah (trash)');
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memindahkan ke kotak sampah (Trash) data kecamatan.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal memindahkan ke kotak sampah (Trash) data kecamatan. ' . $e->getMessage());
            }
        }
    }

    public function trash(Request $request)
    {
        try {
            $trashedKecamatan = Kecamatan::onlyTrashed()->get();

            $data = [
                'header_name' => "Data Kecamatan",
                'page_name' => "Kotak Sampah Data Kecamatan"
            ];

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil memuat data trash kecamatan',
                    'data' => $trashedKecamatan,
                ], Response::HTTP_OK);
            } else {
                return view('pages.data_kecamatan.trash', compact('trashedKecamatan', 'data'));
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Gagal mendapatkan data trash kecamatan',
                        'error' => $e->getMessage(),
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal mendapatkan data trash kecamatan ' . $e->getMessage());
            }
        }
    }

    public function restoreFromTrash($id_kecamatan, Request $request)
    {
        try {
            $restoredKecamatan = Kecamatan::withTrashed()->where('id_kecamatan', $id_kecamatan)->first();

            // Restore trashed data
            $restoredKecamatan->where('id_kecamatan', $id_kecamatan)->restore();

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data kecamatan (' . $restoredKecamatan->name . ') berhasil dikembalikan dari trash.',
                    'data' => $restoredKecamatan,
                ], Response::HTTP_OK);
            } else {
                return redirect()->back()->with('success', 'Data kecamatan (' . $restoredKecamatan->name . ')  berhasil dikembalikan dari trash.');
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengembalikan data instansi dari trash.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {

                return redirect()->back()->with('error', 'Gagal mengembalikan data instansi dari trash. ' . $e->getMessage());
            }
        }
    }

    public function deletePermanently($id_kecamatan, Request $request)
    {
        try {
            $deletedKecamatan = Kecamatan::withTrashed()->where('id_kecamatan', $id_kecamatan)->first();

            // Permanently delete data
            $deletedKecamatan->where('id_kecamatan', $id_kecamatan)->forceDelete();

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data kecamatan (' . $deletedKecamatan->name . ')  berhasil dihapus permanen.',
                ], Response::HTTP_OK);
            } else {
                return redirect()->route('data-kecamatan.index')->with('success', 'Data kecamatan (' . $deletedKecamatan->name . ') berhasil dihapus permanen.');
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus data kecamatan permanen.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {

                return redirect()->back()->with('error', 'Gagal menghapus data kecamatan permanen. ' . $e->getMessage());
            }
        }
    }
}
