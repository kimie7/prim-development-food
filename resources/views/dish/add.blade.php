@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/required-asterick.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Makanan</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active">Makanan >> Tambah Makanan</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">

            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- {{ route('sekolah.store') }} --}}
            <form method="post" action="{{ route('dish.store') }} " enctype="multipart/form-data"
                class="form-validation">
                {{csrf_field()}}
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group required">
                                <label class="control-label">Nama organisasi</label>
                                <select name="org" id="org" class="form-control"
                                    data-parsley-required-message="Sila pilih organisasi" required>
                                    <option value="" selected>Pilih organisasi</option>
                                    @foreach($org as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group required">
                                <label class="control-label">Nama Makanan</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama Makanan"
                                    data-parsley-required-message="Sila masukkan nama Makanan" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group required">
                                <label class="control-label">Jenis Makanan</label>
                                <select name="type_dish" id="type_dish" class="form-control"
                                    data-parsley-required-message="Sila pilih jenis makanan" required>
                                    <option value="" selected>Pilih Jenis Makanan</option>
                                    @foreach($type_dish as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label>Amaun</label>
                        <input id="input-currency" class="form-control input-mask text-left"
                            data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"
                            im-insert="true" name="amount" data-parsley-min="2"
                            data-parsley-required-message="Sila masukkan amaun"
                            data-parsley-error-message="Minimum jumlah untuk diderma adalah RM2.00" required>
                        <p><i>*Minimum RM 2</i> </p>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <div class="form-group required">
                                <label class="control-label">Harga makanan</label>
                                <input type="number" name="price" class="form-control" placeholder="Harga Makanan"
                                    data-parsley-required-message="Sila masukkan harga makanan" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Makanan</label>
                        <form action="#" class="dropzone">
                            <div class="fallback">
                                <input name="dish_image" type="file">
                            </div>
                        </form>
                    </div>
                    <div class="form-group mb-0">
                        <div class="text-right">
                            <a type="button" href="{{ url()->previous() }}"
                                class="btn btn-secondary waves-effect waves-light mr-1">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection