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
  <div class="list" id="container-list">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <h6>Tugas</h6>
          </div>
          <div class="col-md-6 text-end">
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i></button>
              <button type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
              <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </div>
          </div>
          
        </div>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, totam. Nam, id!
      </div>
    </div>
  </div>
@endsection