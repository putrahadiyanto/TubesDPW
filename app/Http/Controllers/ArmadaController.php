<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $armadas = Armada::all();
        return view('admin.armada.armada', compact('armadas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.armada.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'merk' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'kilometer' => 'required|integer',
            'bahan_bakar' => 'required|string|max:255',
            'no_plat' => 'required|string|max:255',
            'transmisi' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'status' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the file upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/armada'), $filename);
        }

        // Create a new Armada instance and fill it with validated data
        $armada = new Armada([
            'merk' => $request->input('merk'),
            'model' => $request->input('model'),
            'nik' => $request->input('nik'),
            'kilometer' => $request->input('kilometer'),
            'bahan_bakar' => $request->input('bahan_bakar'),
            'no_plat' => $request->input('no_plat'),
            'transmisi' => $request->input('transmisi'),
            'warna' => $request->input('warna'),
            'harga' => $request->input('harga'),
            'status' => $request->input('status'),
            'foto' => isset($filename) ? 'images/armada/' . $filename : null
        ]);

        // Save the Armada instance to the database
        $armada->save();

        // Redirect to a specific route with a success message
        return redirect()->route('armada.index')->with('success', 'Armada created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the specific Armada instance
        $armada = Armada::findOrFail($id);

        // Pass the Armada instance to the view
        return view('admin.armada.show', compact('armada'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the specific Armada instance
        $armada = Armada::findOrFail($id);

        // Pass the Armada instance to the view
        return view('admin.armada.edit', compact('armada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Retrieve the Armada instance
        $armada = Armada::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'merk' => 'required|string',
            'model' => 'required|string',
            'nik' => 'required|numeric',
            'kilometer' => 'required|numeric',
            'bahan_bakar' => 'required|in:bensin,diesel,hybrid',
            'transmisi' => 'required|in:manual,automatic',
            'warna' => 'required|string',
            'harga' => 'required|integer',
            'no_plat' => 'required|string',
            'status' => 'required|in:disewa,tersedia,pemeliharaan',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming foto is uploaded via a file input
        ]);

        // Update the Armada attributes with the validated data
        $armada->merk = $request->merk;
        $armada->model = $request->model;
        $armada->nik = $request->nik;
        $armada->kilometer = $request->kilometer;
        $armada->bahan_bakar = $request->bahan_bakar;
        $armada->transmisi = $request->transmisi;
        $armada->warna = $request->warna;
        $armada->harga = $request->harga;
        $armada->no_plat = $request->no_plat;
        $armada->status = $request->status;

        // Handle foto update if a new foto is provided
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('images/armada');
            $armada->foto = $fotoPath;
        }

        // Save the updated Armada instance
        $armada->save();

        // Redirect back to the Armada index page with a success message
        return redirect()->route('armada.index')->with('success', 'Armada details updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the Armada instance by ID
        $armada = Armada::findOrFail($id);

        // Construct the path to the photo
        $photoPath = 'images/armada/' . $armada->foto;

        // Delete the associated foto from storage, if it exists
        if (Storage::exists($photoPath)) {
            Storage::delete($photoPath);
        }

        // Delete the Armada instance
        $armada->delete();

        // Redirect back to the Armada index page with a success message
        return redirect()->route('armada.index')->with('success', 'Armada deleted successfully');
    }


}
