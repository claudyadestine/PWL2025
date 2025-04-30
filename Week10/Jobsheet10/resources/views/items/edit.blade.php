<!DOCTYPE html> <!--Menandakan awal dokumen HTML-->
<html>
<head> <!--bagian penanda kepala halaman--> 
    <title>Edit Item</title> <!--Bagian kepala halaman dengan judul "Edit Item"-->
</head> <!--bagian penanda penutup kepala halaman--> 
<body>  <!--bagian penanda bagian isi--> 
    <h1>Edit Item</h1>   <!--Memulai isi halaman dan menampilkan judul "Edit Item"-->
    <form action="{{ route('items.update', $item) }}" method="POST">  <!--Membuka tag form yang akan mengirimkan data ke route items.update dengan metode POST-->
        @csrf  
        <!--untuk keamanan Laravel-->
        @method('PUT') <!--Mengubah metode request dari POST menjadi PUT-->
        <label for="name">Name:</label> <!--Label untuk input name-->
        <input type="text" name="name" value="{{ $item->name }}" required>   <!--Input teks untuk nama item, equired berarti input wajib diisi -->
        <br>   <!--Memberikan baris baru (enter)-->
        <label for="description">Description:</label> <!--Label untuk input deskripsi item-->
        <textarea name="description" required>{{ $item->description }}</textarea> <!--textarea untuk memasukkan deskripsi item, {{ $item->description }} adalah nilai awal yang diambil dari database-->
        <br> 
        <button type="submit">Update Item</button> <!--Tombol untuk mengirim formulir dan memperbarui data item-->
    </form>  <!--</form> yang menutup formulir-->
    <a href="{{ route('items.index') }}">Back to List</a>  <!--Tautan untuk kembali ke daftar item-->
</body> <!--Menutup bagian body-->
</html> <!--Menutup bagian dokumen HTML-->