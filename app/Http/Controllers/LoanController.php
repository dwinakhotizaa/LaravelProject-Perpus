<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('book')->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $books = Book::all();
        return view('loans.create', compact('books'));
    }

    // Menyimpan data peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id', 
            'borrower_name' => 'required|string|max:255',
            'borrowed_at' => 'required|date',
        ]);

        // Membuat data peminjaman baru
        $loan = new Loan();
        $loan->book_id = $request->book_id;
        $loan->borrower_name = $request->borrower_name;
        $loan->borrowed_at = $request->borrowed_at;

        $loan->return_at = \Carbon\Carbon::parse($request->borrowed_at)->addDay();

        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $loan = Loan::with('book')->findOrFail($id);
        return view('loans.show', compact('loan'));
    }

    public function edit($id)
    {
        $loan = Loan::findOrFail($id); 
        $books = Book::all(); 
        return view('loans.edit', compact('loan', 'books'));
    }

    // Memperbarui data peminjaman
    public function update(Request $request, $id)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id', 
            'borrower_name' => 'required|string|max:255',
            'borrowed_at' => 'required|date',
        ]);

        $loan = Loan::findOrFail($id);
        $loan->book_id = $request->book_id; // Update ID buku
        $loan->borrower_name = $request->borrower_name;
        $loan->borrowed_at = $request->borrowed_at;

        $loan->save();

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    // Menghapus peminjaman
    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }

    // Fungsi untuk mencetak PDF
    public function printPdf($id)
    {
        $loan = Loan::with('book')->findOrFail($id);
        $pdf = Pdf::loadView('loans.pdf', compact('loan'));
        return $pdf->download('detail_peminjaman_' . $loan->id . '.pdf');
    }
}
