@extends('dashboard')
@section('Content')


<a href="#" onclick="ModalTambahProfile()"  class="btn btn-success"> + Add New Data</a>



<table class="table table-bordered">
    <tr>
        <th>Kode Profile</th>
        <th>Nama Profile</th>
        <th>Opsi</th>
    </tr>
    @foreach($profile as $Get)
    <tr>
        <td>{{ $Get->kd_profile }}</td>
        <td>{{ $Get->nama_profile  }}</td>
        <td>
            |
            <a href="#" onclick="ModalEditProfile({{ $Get->kd_profile }} ,'{{ $Get->nama_profile }}')" class="btn btn-info" >Update</a>
            |
            <a href="#" onclick="ModalHapusProfile({{ $Get->kd_profile }})" class="btn btn-danger">Delete</a>

        </td>
    </tr>
    @endforeach
</table> 

<!-- Form Modal Tambah Berita -->
<form action="profile/tambah" method="post">
    @csrf
<div class="modal fade" id="ModalTambahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Kode Profile</label>
                <input type="text" class="form-control" name="kd_profile" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama Profile</label>
                <textarea name="nama_profile" class="form-control" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>
<!-- Form Modal Tambah Berita -->

<!-- Form Modal Hapus Berita-->
<form action="profile/hapus" method="post">
    @csrf
<div class="modal fade" id="ModalHapusProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
              <input type="hidden" name="kd_profile">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
          </div>
      </div>
    </div>
  </div>
</form>
  <!-- Form Modal Hapus Berita-->

  <form action="profile/edit" method="post">
    @csrf
<div class="modal fade" id="ModalEditProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Ubah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Kode Profile</label>
                <input type="text" class="form-control" name="kd_profile" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama Profile</label>
                <input type="text" class="form-control" name="nama_profile"  required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
        </div>
        </div>
    </div>
</div>
</form>
<!-- Form Modal Edit Berita -->


<script>

    // Modal Tambah Berita
    function ModalTambahProfile () {
           $('#ModalTambahProfile').modal('show');
       }
    // Modal Tambah Berita

    // Modal Hapus Berita
     function ModalHapusProfile ($id) {
            $('[name="kd_profile"]').val($id);
           $('#ModalHapusProfile').modal('show');
       }
    // Modal Tambah Berita

    function ModalEditProfile (id,nama) {
    
    $('[name="kd_profile"]').val(id);
    $('[name="nama_profile"]').val(nama);
   $('#ModalEditProfile').modal('show');
}
</script>

    
@endsection


