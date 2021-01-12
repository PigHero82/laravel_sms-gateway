@extends('layout.layout')

@section('title')
    Template SMS
@endsection

@section('content')
    {{-- Table --}}
    <x-table title="Data Template SMS" class="" description="" id="">
        <x-slot name="floatRight">
            <a href="#modalTambahTemplate" class="btn btn-success" data-toggle="modal"><i class="feather icon-plus"></i> Tambah</a>
        </x-slot>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </x-table>

    {{-- Modal --}}
    <x-modal title="Tambah Template" class="" id="modalTambahTemplate">
        <div class="modal-body">
            <x-input-form label="Judul">
                <input type="text" class="form-control" name="" id="" placeholder="Judul">
            </x-input-form>
            <x-input-form label="Custom SMS">
                <input type="text" class="form-control" name="" id="" placeholder="Isi">
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button class="btn btn-primary">Submit</button>
        </div>
    </x-modal>
@endsection