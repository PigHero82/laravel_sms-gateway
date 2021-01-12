@extends('layout.layout')

@section('title')
    Grup Kontak
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <x-table title="Data Grup" description="" id="" class="">
            <x-slot name="floatRight">
                <a class="btn btn-success" href="#modalTambahGrup" data-toggle="modal" role="button"><i class="feather icon-plus"></i> Tambah</a>
            </x-slot>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Grup</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </x-table>
    </section>

    {{-- Modal --}}
    <x-modal id="modalTambahGrup" title="Grup Baru" class="">
        <div class="modal-body">
            <x-input-form label="Nama">
                <input type="text" class="form-control" name="" id="" placeholder="Nama">
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </x-modal>
@endsection