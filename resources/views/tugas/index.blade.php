@extends('layouts.layouts')

@push('css')
<style>
  body{
    background-color: #e3fcbf;
  }
  .card:hover{
    cursor:pointer;
    background-color: #88F1B0
  }
  .done{
    background-color: #00ffab;
  }
  .icon:hover{
    background-color: #88F1B0;
  }
</style>
@endpush

@section('content')
<div class="input-group my-4 ">
    <input type="text" class="form-control" id="key" placeholder="Cari Tugas" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <button class="btn btn-success" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="button-tambah">Tambah</button>
  </div>
  @includeIf('tugas.modal')
  @includeIf('tugas.detail-tugas')
  <div class="list" id="container-list">
  </div>
@endsection

@push('js')
<script>
  console.log('Script berhasil dimuat'); // Tambahkan di bagian atas script
dataTugas();

function dataTugas() {
    console.log('Fungsi dataTugas dijalankan'); // Debug
    $.ajax({
        type: "GET",
        url: "{{ route('tugas.data') }}",
        dataType: "json",
        success: function(response) {
            console.log('Data diterima:', response); // Debug respons
            if (response.length !== 0) {
                $.each(response, function(key, item) {
                    console.log('Item:', item); // Debug setiap item
                    let s = item.status == 1 ? 'bg-secondary text-white' : '';
                    $('#container-list').append(`
                        <div class="card ${s}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-title">${item.judul}</h6>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="#" class="btn btn-success btn-sm" onclick="status(${item.id_tugas})">
                                                <i class="fa-solid fa-check"></i>
                                            </a>
                                            <a href="#" class="btn btn-warning btn-sm edit" data-bs-toggle="modal" 
                                               data-bs-target="#taskmodal" onclick="show(${item.id_tugas})">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="hapus(${item.id_tugas})">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                ${item.deskripsi}
                            </div>
                        </div>
                    `);
                });
            }
        },
        error: function(err) {
            console.error('Error AJAX:', err); // Debug error AJAX
        }
    });
}
function tambah(){
    $('#tambah').removeAttr('onClick');
    let judul = $('#judul').val();
    let deskripsi = $('#deskripsi').val();

    var data = {
        'judul': judul,
        'deskripsi': deskripsi,
    }
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        url:"{{ route('tugas.store') }}",
        data: data,
        dataType:"json",
        success: function(response){
            if(response.status==200){
                $('#judul').val("");
                $('#deskripsi').val("");
                $('.modal').removeClass('show');
                $(".modal").css('display','none');
                $('.modal-backdrop').remove();
                $('body').removeAttr('class');
                $('body').removeAttr('style');
                $('#tambah').attr('onClick','tambah()');
                dataTugas();
            }
        }
    });
}
</script>
@endpush