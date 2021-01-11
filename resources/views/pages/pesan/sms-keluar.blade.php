@extends('layout.layout')

@section('title')
    SMS Keluar
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <x-table title="Data SMS Keluar" description="" id="" class="">
            <x-slot name="floatRight">
                <a class="btn btn-success" href="#modalTambahPesanKeluar" data-toggle="modal" role="button"><i class="feather icon-plus"></i> Tambah</a>
            </x-slot>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Pilih</th>
                    <th>Pengirim</th>
                    <th>Teks</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </x-table>
    </section>

    {{-- Modal --}}
    <x-modal id="modalTambahPesanKeluar" title="Template Baru" class="">
        <div class="modal-body">
            <x-input-form label="Tujuan" type="text" class="" name="" id="" placeholder="Nama" value="" minlength="" maxlength="" required="" />
            <x-textarea label="Tulis Pesan" class="" name="" id="" rows="5" placeholder="Tulis Pesan" required="" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
        </div>
    </x-modal>
@endsection