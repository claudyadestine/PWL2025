<!DOCTYPE html> <!--Menandakan awal dokumen HTML-->
<html> <!--Menandakan awal dokumen HTML-->
<head> <!--bagian penanda kepala halaman--> 
    <title>Edit Item</title> <!--Bagian kepala halaman dengan judul "Edit Item"-->
</head> <!--bagian penanda penutup kepala halaman--> 
<body> <!--bagian penanda bagian isi--> 
    <h1>Edit Item</h1> <!--Memulai isi halaman dan menampilkan judul "Edit Item"-->
    <form action="{{ route('items.update', $item) }}" method="POST"> <!--Membuat form untuk mengedit item, kemudian menggunakan method POST untuk mengirim data ke items.update-->
        @csrf <!--Token keamanan Laravel untuk mencegah CSRF (Cross-Site Request Forgery)-->
        @method('PUT') <!--Mengubah metode POST menjadi PUT, sesuai dengan standar restful untuk update data-->
        <label for="name">Name:</label> <!--Label dan input teks untuk mengedit nama item-->
        <input type="text" name="name" value="{{ $item->name }}" required> <!--value="{{ $item->name }}" menampilkan nama item yang sudah ada, required berarti input wajib diisi-->
        <br>
        <label for="description">Description:</label> <!--Label untuk mengedit deskripsi item-->
        <textarea name="description" required>{{ $item->description }}</textarea> <!--Textarea untuk mengedit deskripsi item, Menampilkan deskripsi item yang sudah ada di dalam-->
        <br>
        <button type="submit">Update Item</button> <!--Tombol untuk mengirim form dan memperbarui item-->
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> <!--Link untuk kembali ke daftar item-->
</body> <!--Menutup isi halaman dan dokumen HTML-->
</html> <!--Menutup isi halaman dan dokumen HTML-->