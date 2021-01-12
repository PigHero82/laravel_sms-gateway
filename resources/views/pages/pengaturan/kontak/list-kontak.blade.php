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
            <x-input-form label="Nama">
                <input type="text" class="form-control" name="" id="" placeholder="Nama">
            </x-input-form>
            
            <x-input-form label="Email">
                <input type="email" class="form-control" name="" id="" placeholder="Email">
            </x-input-form>

            <select class="" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            
            <x-input-form label="Negara">
                <select name="" class="form-control" id="">
                    <option value="" hidden>-- Pilih Negara --</option>
                    <option value="">Indonesia</option>
                    <option value="">Malaysia</option>
                </select>
            </x-input-form>
            
            <x-input-form label="Kode Negara">
                <input type="number" class="form-control" name="" id="" placeholder="Kode Negara">
            </x-input-form>
            
            <x-input-form label="Nomor HP">
                <input type="number" class="form-control" name="" id="" placeholder="Nomor HP">
            </x-input-form>

            <x-input-form label="Grup">
                <select name="" class="form-control" id="">
                    <option value="" hidden>-- Pilih Grup --</option>
                    <option value="">Default</option>
                    <option value="">Modem</option>
                </select>
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </x-modal>

    {{-- Modal Import Kontak --}}
    <x-modal id="modalImportKontak" title="Import Kontak" class="">
        <div class="modal-body">
            <x-input-form  label="File Excel (.xlsx)">
                <input type="file" class="form-control" name="" id="">
            </x-input-form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Upload</button>
        </div>
    </x-modal>
@endsection