@extends('layout.layout')

@section('title')
    Database
@endsection

@section('content')
    {{-- Table --}}
    <x-table title="Database" class="" description="" id="">
        <x-slot name="floatRight"></x-slot>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </x-table>
@endsection