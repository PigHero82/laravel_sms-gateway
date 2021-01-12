@extends('layout.layout')

@section('title')
    Laporan
@endsection

@section('content')
    {{-- Card --}}
    <section>
        <x-card-basic title="Laporan SMS Masuk" class="">
            <x-slot name="floatRight"></x-slot>
            <div class="row">
                <div class="col">
                    <x-input-form label="Tanggal Awal">
                        <input type="date" class="form-control" name="" id="">
                    </x-input-form>
                </div>

                <div class="col">
                    <x-input-form label="Tanggal Akhir">
                        <input type="date" class="form-control" name="" id="">
                    </x-input-form>
                </div>
                
                <div class="col">
                    <x-input-form label=""><br>
                        <button type="button" class="btn btn-primary">Kirim</button>
                    </x-input-form>
                </div>
            </div>
        </x-card-basic>
    </section>

    {{-- Card --}}
    <section>
        <x-card-basic title="Laporan SMS Keluar" class="">
            <x-slot name="floatRight"></x-slot>
            <div class="row">
                <div class="col">
                    <x-input-form label="Tanggal Awal">
                        <input type="date" class="form-control" name="" id="">
                    </x-input-form>
                </div>

                <div class="col">
                    <x-input-form label="Tanggal Akhir">
                        <input type="date" class="form-control" name="" id="">
                    </x-input-form>
                </div>
                
                <div class="col">
                    <x-input-form label=""><br>
                        <button type="button" class="btn btn-primary">Kirim</button>
                    </x-input-form>
                </div>
            </div>
        </x-card-basic>
    </section>
@endsection