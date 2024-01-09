<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $instansi = Instansi::all();
        $data = [
            'header_name' => "Instansi/OPD",
            'page_name' => "Daftar Instansi"
        ];

        if ($request->is('api/*')) {
            // Request dari API
            if ($instansi->isEmpty()) {
                return response()->json([
                    'message' => 'Tidak ada instansi',
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'message' => 'Data instansi berhasil dimuat.',
                    'data' => $instansi,
                ], Response::HTTP_OK);
            }
        } else {
            return view('pages.instansi.index', compact('instansi', 'data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'header_name' => "Instansi/OPD",
            'page_name' => "Tambah Instansi"
        ];

        return view('pages.instansi.create', compact('data'));
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
                    '*.nama-instansi' => 'required|max:255',
                    '*.telepon-instansi' => 'nullable',
                    '*.alamat' => 'nullable',
                    '*.deskripsi' => 'nullable',
                ]);

                $instansiArray = [];

                foreach ($validatedData as $entry) {
                    $instansi = Instansi::create([
                        'nama' => $entry['nama-instansi'],
                        'telepon' => $entry['telepon-instansi'],
                        'alamat' => $entry['alamat'],
                        'deskripsi' => $entry['deskripsi']
                    ]);

                    $instansiArray[] = $instansi;
                }
            } else {
                // Handling single data entry
                $validatedData = $request->validate([
                    'nama-instansi' => 'required|max:255',
                    'telepon-instansi' => 'nullable',
                    'alamat' => 'nullable',
                    'deskripsi' => 'nullable',
                ]);

                $instansi = Instansi::create([
                    'nama' => $validatedData['nama-instansi'],
                    'telepon' => $validatedData['telepon-instansi'],
                    'alamat' => $validatedData['alamat'],
                    'deskripsi' => $validatedData['deskripsi']
                ]);

                $instansiArray = [$instansi];
            }

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data instansi berhasil ditambahkan',
                    'data' => $instansiArray,
                ], Response::HTTP_OK);
            } else {
                Session::flash('success', 'Data instansi berhasil ditambahkan');
                return redirect()->route('instansi.index');
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menambahkan data instansi baru',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal menambahkan data instansi baru ' . $e->getMessage());
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id, Request $request)
    {
        $instansi = Instansi::firstWhere('id', $id);

        $data = [
            'header_name' => "Instansi/OPD",
            'page_name' => "Detail Instansi " . $instansi->nama
        ];

        if ($request->is('api/*')) {
            if ($instansi) {
                return response()->json([
                    'data' => $instansi,
                    'message' => 'Data instansi (' . $instansi->nama . ') berhasil dimuat.',
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'data' => null,
                    'message' => "Data dengan id " . $id . " tidak tersedia",
                ], Response::HTTP_NOT_FOUND);
            }
        } else {
            return view('pages.instansi.read', compact('instansi', 'data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $instansi = Instansi::findOrFail($id);
            $data = [
                'header_name' => "Instansi/OPD",
                'page_name' => "Edit Data Instansi " . $instansi->nama
            ];
            return view('pages.instansi.edit', compact('instansi', 'data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data instansi. ' . $e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $instansi = Instansi::findOrFail($id);

            $validatedData = $request->validate([
                'nama-instansi' => 'required|max:255',
                'telepon-instansi' => 'required',
                'alamat' => 'required',
                'deskripsi' => 'required',
            ]);

            $instansi->update([
                'nama' => $validatedData['nama-instansi'],
                'telepon' => $validatedData['telepon-instansi'],
                'alamat' => $validatedData['alamat'],
                'deskripsi' => $validatedData['deskripsi']
            ]);

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data instansi (' . $instansi->nama . ') berhasil diubah',
                    'data' => $instansi,
                ], Response::HTTP_OK);
            } else {
                Session::flash('success', 'Data instansi (' . $instansi->nama . ') berhasil diubah');
                return redirect()->route('instansi.show', ['instansi' => $instansi->id]);
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memperbarui data instansi.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal memperbarui data instansi. ' . $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        try {
            $instansi = Instansi::withTrashed()->findOrFail($id);

            // Soft delete data
            $instansi->delete();

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data instansi (' . $instansi->nama . ') dipindahkan ke kotak sampah (trash)',
                ], Response::HTTP_OK);
            } else {
                return redirect()->route('instansi.index')->with('success', 'Data instansi (' . $instansi->nama . ') dipindahkan ke kotak sampah (trash)');
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memindahkan ke kotak sampah (Trash) data instansi.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal memindahkan ke kotak sampah (Trash) data instansi. ' . $e->getMessage());
            }
        }
    }

    public function trash(Request $request)
    {
        try {
            $trashedInstansi = Instansi::onlyTrashed()->get();

            $data = [
                'header_name' => "Instansi/OPD",
                'page_name' => "Kotak Sampah Data Instansi"
            ];

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil memuat data trash instansi',
                    'data' => $trashedInstansi,
                ], Response::HTTP_OK);
            } else {
                return view('pages.instansi.trash', compact('trashedInstansi', 'data'));
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Gagal mendapatkan data trash instansi.',
                        'error' => $e->getMessage(),
                    ],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            } else {
                return redirect()->back()
                    ->with('error', 'Gagal mendapatkan data trash instansi. ' . $e->getMessage());
            }
        }
    }

    public function restoreFromTrash($id, Request $request)
    {
        try {
            $restoredInstansi = Instansi::withTrashed()->findOrFail($id);

            // Restore trashed data
            $restoredInstansi->restore();

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data instansi (' . $restoredInstansi->nama . ') berhasil dikembalikan dari trash.',
                    'data' => $restoredInstansi,
                ], Response::HTTP_OK);
            } else {
                return redirect()->back()->with('success', 'Data instansi (' . $restoredInstansi->nama . ')  berhasil dikembalikan dari trash.');
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

    public function deletePermanently($id, Request $request)
    {
        try {
            $deletedInstansi = Instansi::withTrashed()->findOrFail($id);

            // Permanently delete data
            $deletedInstansi->forceDelete();

            if ($request->is('api/*')) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data instansi (' . $deletedInstansi->nama . ')  berhasil dihapus permanen.',
                ], Response::HTTP_OK);
            } else {
                return redirect()->route('instansi.index')->with('success', 'Data instansi (' . $deletedInstansi->nama . ') berhasil dihapus permanen.');
            }
        } catch (\Exception $e) {
            if ($request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus data instansi permanen.',
                    'error' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            } else {

                return redirect()->back()->with('error', 'Gagal menghapus data instansi permanen. ' . $e->getMessage());
            }
        }
    }
}
