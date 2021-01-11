@extends('layout.layout')

@section('title')
    List Kontak
@endsection

@section('content')
    {{-- Table --}}
    <section>
        <div class="row">
            {{-- Data Kontak --}}
            <x-table title="Data Kontak" description="" id="" class="col-md-8">
                <x-slot name="floatRight">
                    <a class="btn btn-success" href="#modalTambahKontak" data-toggle="modal" role="button"><i class="feather icon-plus"></i> Tambah</a>
                    <a class="btn btn-primary" href="#modalImportKontak" data-toggle="modal" role="button"><i class="feather icon-upload"></i> Import</a>
                </x-slot>
    
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Grup</th>
                        <th>Nomor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </x-table>

            {{-- Data Grup --}}
            <x-table title="Data Grup" description="" id="" class="col-md-4">
                <x-slot name="floatRight"></x-slot>
                <thead>
                    <tr>
                        <th>Grup</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </x-table>
        </div>
    </section>

    {{-- Modal Tambah Kontak --}}
    <x-modal id="modalTambahKontak" title="Kontak Baru" class="">
        <div class="modal-body">
            <x-input-form label="Nama" type="text" class="" name="" id="" placeholder="Nama" value="" minlength="" maxlength="" required="" />
            <x-input-form label="Email" type="email" class="" name="" id="" placeholder="Email" value="" minlength="" maxlength="" required="" />
            <x-select label="Negara" name="" id="" required="" class="">
                <option value="" hidden>-- Pilih Negara --</option>
                <option value="">Indonesia</option>
                <option value="">Malaysia</option>
            </x-select>
            <x-input-form label="Kode Negara" type="number" class="" name="" id="" placeholder="Kode Negara" value="" minlength="" maxlength="" required="" />
            <x-input-form label="Nomor HP" type="number" class="" name="" id="" placeholder="Nomor HP" value="" minlength="" maxlength="" required="" />
            <x-select label="Grup" name="" id="" required="" class="">
                <option value="" hidden>-- Pilih Grup --</option>
                <option value="">Default</option>
                <option value="">Modem</option>
            </x-select>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </x-modal>

    {{-- Modal Import Kontak --}}
    <x-modal id="modalImportKontak" title="Import Kontak" class="">
        <div class="modal-body">
            <x-input-form label="File Excel (.xlsx)" type="file" class="form-control-file" name="" id="" placeholder="" value="" minlength="" maxlength="" required="" />
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Upload</button>
        </div>
    </x-modal>
@endsection