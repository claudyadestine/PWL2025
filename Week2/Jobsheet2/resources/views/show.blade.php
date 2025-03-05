<!DOCTYPE html> <!--Menandakan awal dokumen HTML-->
<html> <!--Menandakan awal dokumen HTML-->
<head> <!--bagian penanda kepala halaman--> 
    <title>Item List</title> <!--Bagian kepala halaman yang berisi judul "Item List"-->
</head> <!--bagian penanda penutup kepala halaman--> 
<body> <!--bagian penanda bagian isi--> 
    <h1>Items</h1> <!--Memulai isi halaman dan menampilkan judul "Items"-->
    @if(session('success')) <!--Menampilkan pesan sukses jika ada, misalnya setelah menambahkan, mengedit, atau menghapus item-->
        <p>{{ session('success') }}</p> <!--Menampilkan pesan sukses jika ada, misalnya setelah menambahkan, mengedit, atau menghapus item-->
    @endif <!--Menampilkan pesan sukses jika ada, misalnya setelah menambahkan, mengedit, atau menghapus item-->
    <a href="{{ route('items.create') }}">Add Item</a> <!--Membuat link untuk menambahkan item baru-->
    <ul> <!--Memulai daftar item menggunakan unordered list (ul)-->
        @foreach($items as $item) <!--Melakukan perulangan untuk menampilkan semua item yang ada dalam variabel $items-->
            <li> 
                {{ $item->name }} - <!--Menampilkan nama item dan tombol Edit untuk mengedit item tersebut-->
                <a href="{{ route('items.edit', $item) }}">Edit</a> <!--Menampilkan nama item dan tombol Edit untuk mengedit item tersebut-->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    <!--Membuat form untuk menghapus item, method="POST" digunakan untuk mengirim data ke server, style="display:inline;" membuat form tetap sejajar dengan teks lain-->
                    @csrf <!--Menambahkan token keamanan CSRF untuk mencegah serangan dari luar-->
                    @method('DELETE') <!--Mengubah metode POST menjadi DELETE, sesuai standar RESTful untuk menghapus data-->
                    <button type="submit">Delete</button> <!--Tombol untuk menghapus item saat ditekan-->
                </form>  <!--Menutup form dan item list (li)-->
            </li> <!--Menutup form dan item list (li)-->
        @endforeach <!--Mengakhiri perulangan yang menampilkan semua item-->
    </ul> <!--Menutup daftar item, isi halaman, dan dokumen HTML-->
</body> <!--Menutup daftar item, isi halaman, dan dokumen HTML-->
</html> <!--Menutup daftar item, isi halaman, dan dokumen HTML-->