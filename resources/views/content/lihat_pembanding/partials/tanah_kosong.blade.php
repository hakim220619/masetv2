<div class="card-header">
    <h2 class="mb-4">Data Pembanding : {{ $nama_pembanding }}</h2>
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
        .table {
            margin-bottom: 0;
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
