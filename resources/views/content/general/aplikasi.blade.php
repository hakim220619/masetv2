@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Aplikasi')

@section('content')

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-tile mb-0"><b>{{ $title }}</b></h5>
                </div>
                <div class="card-body">
                    <form action="/setting/aplikasi/editProses" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $aplikasi->id }}" hidden>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="pemilik">Pemilik</label>
                                    <input type="text" class="form-control" id="pemilik" name="pemilik"
                                        value="{{ $aplikasi->pemilik }}" placeholder="Masukan Pemilik" required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="no">Telephone</label>
                                    <input type="text" class="form-control" id="no" name="no"
                                        value="{{ $aplikasi->kontak }}" placeholder="Masukan Telephone" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $aplikasi->title }}" placeholder="Masukan Title" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Nama Aplikasi</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $aplikasi->name }}" placeholder="Masukan Name Aplikasi" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="logo">Logo</label>
                                    <input type="file" class="form-control" id="logo" name="logo"
                                        value="{{ $aplikasi->logo }}" placeholder="Masukan Logo" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="copy_right">Copy Right</label>
                                    <input type="text" class="form-control" id="copy_right" name="copy_right"
                                        value="{{ $aplikasi->copy_right }}" placeholder="Masukan copy_right" required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="versi">Versi</label>
                                    <input type="text" class="form-control" id="versi" name="versi"
                                        value="{{ $aplikasi->versi }}" placeholder="Masukan versi" required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="token_whatsapp">Token Whatsapp</label>
                                    <input type="text" class="form-control" id="token_whatsapp" name="token_whatsapp"
                                        value="{{ $aplikasi->token_whatsapp }}" placeholder="Masukan Token Whatsapp"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="Alamat">Alamat</label>
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required>{{ $aplikasi->alamat }} </textArea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                {{-- <a href="/tahun" type="button" class="btn btn-success">Kembali</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
