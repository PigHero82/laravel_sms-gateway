@extends('layout.layout')

@section('title')
    Pengaturan Modem
@endsection

@section('content')
    {{-- Card --}}
    <section>
        <x-card-basic class="" title="Setting Modem SMS Gateway">
            <x-slot name="floatRight"></x-slot>
            <div class="row text-center">
                <div class="col-sm mb-1">
                    <a class="btn btn-primary" href="#" role="button"><i class="feather icon-settings"></i> Setting Modem</a>
                </div>
                <div class="col-sm mb-1">
                    <a class="btn btn-success" href="#" role="button"><i class="feather icon-check"></i> Cek Service Modem</a>
                </div>
                <div class="col-sm mb-1">
                    <a class="btn btn-success" href="#" role="button"><i class="feather icon-send"></i> Tes Kirim SMS</a>
                </div>
                <div class="col-sm mb-1">
                    <a class="btn btn-success" href="#" role="button"><i class="feather icon-send"></i> Cek SMS Masuk</a>
                </div>
            </div>
        </x-card-basic>
    </section>
@endsection