<!DOCTYPE html>  <!--Menandakan awal dokumen HTML-->
<html>
<head>  <!--bagian penanda kepala halaman--> 
    <title>Item List</title> <!--Bagian kepala halaman dengan judul "Item List"-->
</head>  <!--bagian penanda penutup kepala halaman--> 
<body>   <!--bagian penanda bagian isi--> 
    <h1>Items</h1> <!--Memulai isi halaman dan menampilkan judul "Items"-->
    @if(session('success')) <!--Mengecek apakah ada pesan sukses yang tersimpan di session-->
        <p>{{ session('success') }}</p> <!--ika ada, pesan tersebut akan ditampilkan dalam elemen <p>-->
    @endif 
    <!--Menutup kondisi if, jika tidak ada pesan sukses, bagian ini tidak akan ditampilkan-->
    <a href="{{ route('items.create') }}">Add Item</a> <!--Membuat tautan ke halaman tambah item dengan menggunakan route('items.create')-->
    <ul>  <!--Membuka elemen unordered list-->
        @foreach ($items as $item) <!--Melakukan iterasi (loop) pada semua item yang tersedia dalam variabel $items-->
            <li> <!--Membuka elemen list item (<li>), setiap item akan ditampilkan dalam daftar-->
                {{ $item->name }} <!--Menampilkan nama item.-->
                <a href="{{ route('items.edit', $item) }}">Edit</a>  <!--Membuat tautan ke halaman edit untuk item tersebut dengan route items.edit-->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">  <!--Formulir untuk menghapus item menggunakan route('items.destroy', $item) dengan metode POST, style="display:inline;" memastikan form tetap sejajar dengan teks-->
                    @csrf 
                    <!--untuk keamanan Laravel-->
                    @method('DELETE')  <!--Mengubah metode HTTP menjadi DELETE-->
                    <button type="submit">Delete</button>  <!--Tombol untuk menghapus item-->
                </form> <!--Menutup elemen form-->
            </li>  <!--Menutup elemen list item -->
        @endforeach 
        <!--Menutup loop foreach, setelah semua item ditampilkan-->
    </ul> <!--Menutup elemen unordered list -->
</body> <!--Menutup bagian body-->
</html> <!--Menutup dokumen HTML-->