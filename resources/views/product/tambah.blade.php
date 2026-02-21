<x-layouts::app :title="__('Tambah data')">
    <form action=" {{ route('produk.store') }} " method="POST" enctype="multipart/form-data">
        @csrf
        <input class="border border-white" type="text" name="nama" placeholder="nama">
        <input class="border border-white" type="number" name="harga" placeholder="harga">
        <input class="border border-white" type="number" name="stock" placeholder="stock">
        <input class="border border-white" type="text" name="deskripsi" placeholder="deskripsi">
        <input class="border border-white" type="file" name="gambar" placeholder="gambar">
        <button type="submit">Submit</button>
    </form>
</x-layouts::app>