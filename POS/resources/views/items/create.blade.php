<!DOCTYPE html> <!--Menandakan awal dokumen HTML-->
<html> <!--Menandakan awal dokumen HTML-->
<head> <!--bagian penanda kepala halaman--> 
    <title>Add Item</title> <!--Bagian kepala halaman dengan judul "Add Item"-->
</head> <!--bagian penanda penutup kepala halaman--> 
<body> <!--bagian penanda bagian isi--> 
    <h1>Add Item</h1> <!--Memulai isi halaman dan menampilkan judul "Add Item"--> 
    <form action="{{ route('items.store') }}" method="POST"> <!--Membuat form untuk menambahkan item kemudian menggunakan method POST untuk mengirim data ke items.store-->
        @csrf 
        <!--Token keamanan Laravel untuk mencegah CSRF (Cross-Site Request Forgery)-->
        <label for="name">Name:</label> <!--Label dan input untuk mengisi nama item-->
        <input type="text" name="name" required>  <!--required berarti input wajib diisi-->
        <br>
        <label for="description">Description:</label> <!--Label dan input teks area untuk mengisi deskripsi item-->
        <textarea name="description" required></textarea> <!--required berarti input wajib diisi-->
        <br>
        <button type="submit">Add Item</button> <!--Tombol untuk mengirim form dan menambahkan item-->
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> <!--Link untuk kembali ke daftar item-->
</body> <!--Menutup isi halaman dan dokumen HTML-->
</html> <!--Menutup isi halaman dan dokumen HTML-->