<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); 
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
    ], [
        'foto.required' => 'Foto buku wajib diisi.',
        'foto.image' => 'File yang diunggah harus berupa gambar.',
        'foto.mimes' => 'Hanya mendukung format: jpeg, png, jpg, gif.',
        'judul.required' => 'Judul buku wajib diisi.',
        'penulis.required' => 'Penulis buku wajib diisi.',
        'penerbit.required' => 'Penerbit buku wajib diisi.',
    ]);

    // Proses penyimpanan foto
    $fotoPath = $request->file('foto')->store('public/gambar_buku');

    // Simpan data buku beserta path foto di database
    Book::create([
        'foto' => str_replace('public/', '', $fotoPath), // Hapus 'public/' dari path
        'judul' => $request->judul,
        'penulis' => $request->penulis,
        'penerbit' => $request->penerbit,
    ]);

    return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
}


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'penulis.required' => 'Penulis buku wajib diisi.',
            'penerbit.required' => 'Penerbit buku wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ]);
    
        $book = Book::findOrFail($id);
        
        // Menangani upload foto jika ada
        if ($request->hasFile('foto')) {
            if ($book->foto) {
                Storage::delete($book->foto); // Hapus foto yang lama
            }
    
            $path = $request->file('foto')->store('gambar_buku');
            $book->foto = $path; // Simpan path foto baru
        }
    
        // Update data buku lainnya
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->penerbit = $request->penerbit; // Update penerbit
        $book->save();
    
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }
    
    public function destroy($id)
{
    $book = Book::findOrFail($id);

    if ($book->foto) {
        Storage::delete($book->foto); 
    }

    $book->delete();

    return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
}

}
