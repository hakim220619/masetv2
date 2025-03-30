<div class="analisa-card mt-5">
    <div class="analisa-tanah-section">
        <div class="table-responsive">
            <table class="table table-bordered table-striped analisa-table">
                <tr class="table-primary">
                    <th width="40%" class="text-center">DESKRIPSI</th>
                    <th width="60%" colspan="4" class="text-center">ANALISA
                        TANAH<br>{{ $nama_pembanding ?? 'Data Pembanding' }}</th>
                </tr>
                <tr>
                    <td class="text-left bold">Alamat Properti</td>
                    <td colspan="4">{{ $alamat ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Koordinat Latitude</td>
                    <td colspan="4">{{ $lat ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Koordinat Longitude</td>
                    <td colspan="4">{{ $long ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Nama</td>
                    <td colspan="4">{{ $nama_narsum ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Telepon</td>
                    <td colspan="4">{{ $telepon ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Jenis Data (Transaksi/ Penawaran)</td>
                    <td colspan="4">{{ $jenis_data ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Waktu Transaksi/ Penawaran</td>
                    <td colspan="4">
                        {{ isset($tgl_penawaran) ? date('d F Y', strtotime($tgl_penawaran)) : date('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Luas Tanah</td>
                    <td colspan="4">{{ $luas_tanah ?? 0 }} m<sup>2</sup></td>
                </tr>
                <tr>
                    <td class="text-left bold">Luas Bangunan</td>
                    <td colspan="4">{{ $luas_bangunan_total ?? 0 }} m<sup>2</sup></td>
                </tr>
                <tr class="table-primary">
                    <td bgcolor="#DDD" colspan="5" class="text-center bold">UNIT</td>
                </tr>
                <tr>
                    <td class="text-left bold">Unit</td>
                    <td class="text-right" colspan="4">m<sup>2</sup></td>
                </tr>
                <tr>
                    <td class="text-left bold">Mata Uang</td>
                    <td class="text-right" colspan="4">Rp</td>
                </tr>
                <tr>
                    <td class="text-left bold">Indikasi Harga Penawaran</td>
                    <td class="text-right" colspan="4">{{ number_format($harga_penawaran ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Diskon</td>
                    <td class="text-right" colspan="4">{{ $diskon ?? 0 }}%</td>
                </tr>
                <tr>
                    <td class="text-left bold">Kemungkinan Transaksi</td>
                    <td class="text-right" colspan="4">{{ number_format($estimasi_transaksi ?? 0, 0, ',', '.') }}
                    </td>
                </tr>
                <tr class="table-primary">
                    <td bgcolor="#DDD" class="text-center bold">Residual Process (if needed)</td>
                    <td colspan="4" bgcolor="#DDD" class="text-center">Metode Ektraksi</td>
                </tr>
                <tr>
                    <td class="text-left bold">Indikasi Biaya Pengganti Baru/m<sup>2</sup></td>
                    <td class="text-right" colspan="4">
                        {{ number_format($indikasi_biaya_pengganti_baru_m2 ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Indikasi Biaya Pengganti Baru Bangunan</td>
                    <td class="text-right" colspan="4">
                        {{ number_format($indikasi_biaya_pengganti_baru ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Tahun Bangunan / Indikasi Umur Ekonomis</td>
                    <td class="text-right" colspan="2">{{ $tahun_bangunan ?? 0 }}</td>
                    <td class="text-right" colspan="2">{{ $umur_ekonomis ?? 0 }} thn</td>
                </tr>
                <tr>
                    <td class="text-left bold">Tahun Renovasi / Bobot Renov</td>
                    <td class="text-right" colspan="2">N/A</td>
                    <td class="text-right" colspan="2">0%</td>
                </tr>
                <tr class="table-primary">
                    <td bgcolor="#DDD" colspan="5" class="text-center bold">Depresiasi</td>
                </tr>
                <tr>
                    <td class="text-left bold" style="padding-left:1.5rem">Fisik</td>
                    <td colspan="2">Kondisi Fisik Bangunan :</td>
                    <td class="text-right" colspan="1">{{ $depresiasi_fisik ?? 0 }}%</td>
                    <td class="text-right" colspan="1">{{ 100 - ($depresiasi_fisik ?? 0) }}%</td>
                </tr>
                <tr>
                    <td class="text-left bold" style="padding-left:1.5rem">Kondisi Terlihat (Maintenance)</td>
                    <td colspan="3">{{ $maintenance == 1 ? 'Baik' : 'Kurang Baik' }}</td>
                    <td class="text-right" colspan="1">{{ $maintenance ?? 0 }}%</td>
                </tr>
                <tr>
                    <td class="text-left bold" style="padding-left:1.5rem">Kemunduran Fungsi</td>
                    <td colspan="3">{{ $penjelasan_kemunduran_fungsi ?? '-' }}</td>
                    <td class="text-right" colspan="1">{{ $depresiasi_kemunduran_fungsi ?? 0 }}%</td>
                </tr>
                <tr>
                    <td class="text-left bold" style="padding-left:1.5rem">Kemunduran Ekonomis</td>
                    <td colspan="3">{{ $penjelasan_kemunduran_ekonomis ?? '-' }}</td>
                    <td class="text-right" colspan="1">{{ $depresiasi_kemunduran_ekonomis ?? 0 }}%</td>
                </tr>
                <tr>
                    <td class="text-left bold" style="padding-left:1.5rem">Total Depresiasi</td>
                    <td class="text-right bold" colspan="4"><strong>{{ $total_depresiasi ?? 53.33 }}%</strong></td>
                </tr>
                <tr>
                    <td class="text-left bold">Indikasi Nilai Pasar Bangunan/m<sup>2</sup></td>
                    <td class="text-right" colspan="4" title="">
                        {{ number_format($indikasi_nilai_pasar_bangunan_m2 ?? 2655990, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Indikasi Nilai Pasar Bangunan</td>
                    <td class="text-right" colspan="4" title="">
                        {{ number_format($indikasi_nilai_pasar_bangunan ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Indikasi Nilai Pasar Tanah</td>
                    <td class="text-right" colspan="4" title="">
                        {{ number_format($indikasi_nilai_pasar_tanah ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="text-left bold">Indikasi Nilai Pasar Tanah / m<sup>2</sup></td>
                    <td class="text-right bold" colspan="4" title="">
                        <strong>{{ number_format($indikasi_nilai_pasar_tanah_m2 ?? 0, 0, ',', '.') }}</strong>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
