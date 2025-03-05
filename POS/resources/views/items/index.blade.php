<!DOCTYPE html> <!--Menandakan awal dokumen HTML-->
<html>  <!--Menandakan awal dokumen HTML-->
<head> <!--Bagian kepala halaman yang berisi judul "Item List"-->
    <title>Item List</title> <!--Bagian kepala halaman yang berisi judul "Item List"-->
</head> <!--Bagian kepala halaman yang berisi judul "Item List"-->
<body> <!--Memulai bagian isi halaman dan menampilkan judul "Items"-->
    <h1>Items</h1>  <!--Memulai bagian isi halaman dan menampilkan judul "Items"-->
    @if (session('success')) <!--Menampilkan pesan sukses jika ada session dengan key success-->
        <p>{{ session('success') }}</p> <!--Menampilkan pesan sukses jika ada session dengan key success-->
    @endif 
    <!--Menampilkan pesan sukses jika ada session dengan key success-->
    <a href="{{ route('items.create') }}">Add Item</a> <!--Link untuk menambah item baru dengan mengarah ke halaman items.create-->
    <ul> <!--Memulai daftar item dalam bentuk list-->
        @foreach($items as $item) <!--Melakukan perulangan untuk setiap item dalam variabel $items-->
            <li> <!--Menampilkan nama item dan tombol edit yang mengarah ke halaman edit item-->
                {{ $item->name }} - <!--Menampilkan nama item dan tombol edit yang mengarah ke halaman edit item-->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!--Menampilkan nama item dan tombol edit yang mengarah ke halaman edit item-->
<!--Membuat form untuk menghapus item dengan metode POST, kemudian menggunakan style="display:inline;" agar form berada dalam satu baris-->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf 
                    <!--Menambahkan token CSRF untuk keamanan-->
                    @method('DELETE') <!--Mengganti metode POST menjadi DELETE, sesuai dengan restful API untuk menghapus data-->
                    <button type="submit">Delete</button> <!--Tombol untuk menghapus item-->
                </form> <!--Menutup form penghapusan item-->
            </li>  <!--Menutup item list dan mengakhiri perulangan-->
        @endforeach  
        <!--Menutup item list dan mengakhiri perulangan-->
    </ul> <!--Menutup daftar, isi halaman, dan dokumen HTML-->
</body> <!--Menutup daftar, isi halaman, dan dokumen HTML-->
</html> <!--Menutup daftar, isi halaman, dan dokumen HTML-->