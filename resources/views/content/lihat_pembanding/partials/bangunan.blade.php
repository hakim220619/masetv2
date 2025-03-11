<div class="card-header">
    <h2 class="mb-4">Data Pembanding : {{ $nama_pembanding }}</h2>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">
                        <h5>DESKRIPSI</h5>
                    </th>
                    <th class="text-center">
                        <h5>ANALISA BANGUNAN : {{ $nama_pembanding }}</h5>
                    </th>
                    <th class="text-center">
                        <h5>BUT Standar DKI</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Luas Rangka Atap (Datar)</td>
                    <td>270 m2</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Total Luas Rangka Atap</td>
                    <td>270 m2</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Luas Atap (Datar)</td>
                    <td>270 m2</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Total Luas Atap</td>
                    <td>270 m2</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Rasio Luas Rangka Atap (Datar) dibagi Lantai</td>
                    <td>100%</td>
                    <td>BUT Standar DKI : 55.69%</td>
                </tr>
                <tr>
                    <td>Rasio Luas Atap (Datar) dibagi Lantai</td>
                    <td>100%</td>
                    <td>BUT Standar DKI : 55.69%</td>
                </tr>
                <tr>
                    <td>Rasio Volume Dinding dibagi Lantai</td>
                    <td>219%</td>
                    <td>BUT Standar DKI : 214.3%</td>
                </tr>
                <tr>
                    <td>Rasio Volume Pintu/Jendela dibagi Lantai</td>
                    <td>22.5%</td>
                    <td>BUT Standar DKI : 21.8%</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="data-pembanding">
                <thead>
                    <tr>
                        <th class="text-center">
                            <h5>DESKRIPSI</h5>
                        </th>
                        <th class="text-center">
                            <h5>ANALISA TANAH : {{ $nama_pembanding }}</h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            margin-bottom: 0;
            white-space: nowrap;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
        }

        .table-striped>tbody>tr:nth-of-type(odd)>td {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .table-bordered> :not(caption)>*>* {
            border: 1px solid #dee2e6;
            padding: 0.75rem;
        }

        .text-white-50 {
            color: rgba(255, 255, 255, 0.75) !important;
        }
    </style>
@endpush
