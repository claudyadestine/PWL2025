<?php       //untuk menandakan awal dari kode PHP.

namespace App\Http\Controllers;     //Menentukan namespace atau ruang lingkup dari controller, yaitu App\Http\Controllers

use App\Models\Item;                //Menggunakan model Item untuk mengakses data di database
use Illuminate\Http\Request;        //Menggunakan Request untuk menangani data yang dikirim dari form
class ItemController extends Controller     //Mendeklarasikan class ItemController yang merupakan turunan dari Controller
{
    public function index()      //Method untuk menampilkan semua data Item           
    {
        $items = Item::all();      //Mengambil semua data dari tabel items          
        return view('items.index', compact('items')); //Mengirim data items ke view items.index untuk ditampilkan
    }

    public function create() //Method untuk menampilkan form tambah I
    {
        return view('items.create');      //Mengarahkan pengguna ke halaman form items.create
    }

    public function store(Request $request)     //Method untuk menyimpan data item baru
    {
        $request->validate([            
            'name' => 'required',           
            'description' => 'required',    
        ]); //Memvalidasi input agar name dan description tidak boleh kosong

        Item::create($request->only(['name', 'description']));      //Menyimpan item baru ke database
        return redirect()->route('items.index')->with('success', '  Item added successfully.');      //Mengarahkan kembali ke halaman daftar item dengan pesan sukses 
    }

    public function show(Item $item)        //Method untuk menampilkan detail satu item tertentu
    {
        return view('items.show', compact('item'));   //Mengirim data item ke view items.show untuk ditampilkan     
    }

    public function edit(Item $item)      //Method untuk menampilkan form edit item    
    {
        return view('items.edit', compact('item'));    //Mengirim data item ke form items.edit agar dapat diedit
    }

    public function update(Request $request, Item $item)      //Method untuk menyimpan perubahan pada item 
    {
        $request->validate([            
            'name' => 'required',           
            'description' => 'required',    
        ]); //Memvalidasi input agar name dan description tidak boleh kosong

        $item->update($request->only(['name', 'description']));   //Memperbarui data item yang ada di database  
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');   //Mengarahkan kembali ke daftar item dengan pesan sukses   
    }

    public function destroy(Item $item)     //Method untuk menghapus item
    {
        $item->delete();    //Menghapus item dari database 
        return redirect()->route('items.index')->with('success', 'Item deleted successfully');      //Mengarahkan kembali ke daftar item dengan pesan sukses
    }
}      