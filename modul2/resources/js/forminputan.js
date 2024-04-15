<h1.>Input Nama</h1.>
<form id="namaForm" action="{{ route('modul-1') }}" method="GET">
    <div id="namaFields">
        <label for="nama">:</label><br>
        <input type="text" name="nama[]"><br></br>
    </div>
    <button type="button" onclick="tambahField()">Tambah Nama</button>
    <button type="button" onclick="hapusField()">Hapus Nama</button>
    <br></br>
    <button type="submit">Analisis</button>
</form>

<script>
    function tambahField() {
        var div = document.createElement('div');
        div.innerHTML = '<label for="nama">:</label><br></br>'
</script>
