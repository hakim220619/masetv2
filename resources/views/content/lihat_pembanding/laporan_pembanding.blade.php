@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Laporan Pembanding')

@section('content')
    <div class="container-fluid">
        @if ($sumber == 'Tanah Kosong')
            @include('content.lihat_pembanding.partials.tanah_kosong')
        @elseif ($sumber == 'Pembanding Retail')
            @include('content.lihat_pembanding.partials.retail')
        @elseif ($sumber == 'Pembanding Bangunan')
            @include('content.lihat_pembanding.partials.bangunan')
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .card-header {
            background-color: #1e1e4f !important;
            color: white;
        }

        .table {
            margin-bottom: 0;
        }

        .table td {
            padding: 12px;
            border: 1px solid #dee2e6;
            vertical-align: middle;
        }

        .bg-unit {
            background-color: #6c757d;
            color: white;
            text-align: center;
            font-weight: bold;
        }

        .table tr:nth-child(odd) {
            background-color: rgba(30, 30, 79, 0.05);
        }

        .table tr:hover {
            background-color: rgba(30, 30, 79, 0.1);
        }
    </style>
@endpush
