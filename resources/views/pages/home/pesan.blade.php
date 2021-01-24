@extends('layout.layout')

@section('title')
    Pesan Baru
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-block">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('sms.send') }}" method="post">
        @csrf
        <!-- Receiever -->
        <section>
            <x-input-form label="Penerima">
                <select name="customer_id" class="form-control">
                    <option value="" hidden>--Pilih pelanggan</option>
                    @foreach ($customer as $item)
                        <option value="{{ $item->customer_id }}">{{ $item->name . ' - ' . $item->phone }}</option>
                    @endforeach
                </select>
            </x-input-form>
        </section>
        <!--/ Receiever -->

        <!-- Template -->
        <section>
            <x-input-form label="Template">
                <select name="template" class="form-control" id="template">
                    <option value="" hidden>--Pilih template</option>
                    @foreach ($template as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </x-input-form>
        </section>
        <!--/ Template -->

        <!-- Message -->
        <section>
            <x-input-form label="Tulis Pesan">
                <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Tulis Pesan"></textarea>
            </x-input-form>
        </section>
        <!--/ Message -->
        
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#template').change(function () {
                id = $('#template option:selected').val()
                
                $.get("/template/" + id, function( data ) {
                    var d = JSON.parse(data);
                    $('#message').val(d.message);
                });
            })
        });
    </script>
@endsection