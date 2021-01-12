@extends('layout.layout')

@section('title')
    Auto Replay
@endsection

@section('content')
    {{-- Table --}}
    <x-table title="Keyword SMS Auto Replay" class="" description="" id="">
        <x-slot name="floatRight">
            <a href="#modalTambahKeyword" class="btn btn-success" data-toggle="modal"><i class="feather icon-plus"></i> Tambah</a>
        </x-slot>
        <thead>
            <tr>
                <th>No</th>
                <th>Keyword</th>
                <th>Ket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </x-table>

    {{-- Modal --}}
    <x-modal title="Tambah Keyword" class="" id="modalTambahKeyword">
        <div class="modal-body">
            <x-input-form label="Format Keyword">
                <input type="text" class="form-control" name="" id="">
            </x-input-form>
            <x-input-form label="Isi Keyword">
                <input type="text" class="form-control" name="" id="">
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button class="btn btn-primary">Submit</button>
        </div>
    </x-modal>
@endsection