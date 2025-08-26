@extends('front-view.layouts.app')

@push('styles')
    <style>
        .map-section {
            position: relative;
        }

        .map-overlay {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 12px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            font-weight: bold;
            color: #333;
        }

        .map-overlay .bi-geo-alt-fill {
            margin-right: 8px;
            color: #d4af37;
            /* Gold color to match branding */
        }
    </style>
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade">
        <div class="container position-relative">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang di panel admin. Dari sini Anda dapat mengelola konten, pengguna, dan seluruh pengaturan
                sistem.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('admin') }}">Home</a></li>
                    <li class="current">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-lg-12">
                    <div class="service-main-content">
                        <div class="service-header" data-aos="fade-up">
                            <h1>Dashboard Admin</h1>
                            <div class="service-meta">
                                <span><i class="bi bi-speedometer2"></i> Admin Panel</span>
                                <span><i class="bi bi-calendar"></i> Mengelola data real-time</span>
                                <span><i class="bi bi-gem"></i> Harga Emas & Gramasi</span>
                            </div>
                            <p class="lead">
                                Selamat datang di dashboard admin. Di sini Anda dapat memperbarui harga emas secara
                                realtime,
                                menyesuaikan gramasi produk, serta mengelola informasi penting terkait katalog dan data
                                transaksi.
                                Semua perubahan akan tercatat dan dapat langsung dilihat di sistem.
                            </p>
                        </div>

                        <div class="service-tabs" data-aos="fade-up" data-aos-delay="200">
                            <ul class="nav nav-tabs" id="serviceTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#harga-emas"
                                        type="button" role="tab" aria-controls="overview" aria-selected="true">
                                        <i class="bi bi-diagram-3"></i> Kelola Harga
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#service-details-tab-2"
                                        type="button" role="tab" aria-controls="process" aria-selected="false">
                                        <i class="bi bi-info-circle"></i> Informasi Penting
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#service-details-tab-3"
                                        type="button" role="tab" aria-controls="benefits" aria-selected="false">
                                        <i class="bi bi-graph-up-arrow"></i> Informasi Lainnya
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane fade show active" id="harga-emas" role="tabpanel"
                                    aria-labelledby="overview-tab">
                                    <form action="{{ route('admin.update_gold_prices') }}" method="POST"
                                        id="goldPricesForm">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-12 d-flex justify-content-between align-items-center">
                                                <h3>Kelola Harga Emas Batangan</h3>
                                                <button type="button" class="btn btn-success mb-1" id="addRow">+ Tambah
                                                    Berat</button>
                                            </div>
                                        </div>

                                        <table class="table table-bordered rounded-3 overflow-hidden" id="goldPricesTable">
                                            <thead>
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No.</th>
                                                        <th>Berat (gr)</th>
                                                        <th>Harga Dasar</th>
                                                        <th>Harga (+Pajak PPh 0.25%)</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </thead>
                                            <tbody>
                                                @forelse ($goldPrices as $price)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><input type="text" name="weight[]" class="form-control"
                                                                value="{{ $price->weight }}" placeholder="Berat (gr)"></td>
                                                        <td><input type="text" name="base_price[]"
                                                                class="form-control price-format"
                                                                value="{{ number_format($price->base_price, 0, '.', '.') }}"
                                                                placeholder="Harga Dasar"></td>
                                                        <td><input type="text" name="price_pph[]"
                                                                class="form-control price-format"
                                                                value="{{ number_format($price->price_pph, 0, '.', '.') }}"
                                                                placeholder="Harga +PPh 0.25%"></td>
                                                        <td><button type="button"
                                                                class="btn btn-danger btn-sm removeRow">Hapus</button></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="text" name="weight[]" class="form-control"
                                                                value="" placeholder="Berat (gr)"></td>
                                                        <td><input type="text" name="base_price[]"
                                                                class="form-control price-format" value=""
                                                                placeholder="Harga Dasar"></td>
                                                        <td><input type="text" name="price_pph[]"
                                                                class="form-control price-format" value=""
                                                                placeholder="Harga +PPh 0.25%"></td>
                                                        <td><button type="button"
                                                                class="btn btn-danger btn-sm removeRow">Hapus</button></td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="service-details-tab-2" role="tabpanel"
                                    aria-labelledby="process-tab">
                                    <form action="{{ route('admin.update_important_note') }}" method="POST"
                                        id="importantNotesForm">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-12 d-flex justify-content-between align-items-center">
                                                <h3>Keterangan Penting</h3>
                                                <button type="button" class="btn btn-success btn-sm"
                                                    id="addImportantNote">
                                                    <i class="bi bi-plus-lg"></i> Tambah Keterangan
                                                </button>
                                            </div>
                                        </div>

                                        <table class="table table-bordered rounded-3 overflow-hidden"
                                            id="importantNotesTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="5%">No.</th>
                                                    <th>Keterangan</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($importantNotes as $note)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <textarea name="important_notes[]" class="form-control required" rows="3"
                                                                placeholder="Masukkan keterangan penting...">{{ $note->note }}</textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm removeNote">Hapus</button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <textarea name="important_notes[]" class="form-control required" rows="3"
                                                                placeholder="Masukkan keterangan penting..."></textarea>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm removeNote">Hapus</button>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <button type="submit" class="btn btn-primary mt-3">
                                            Simpan Perubahan
                                        </button>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="service-details-tab-3" role="tabpanel"
                                    aria-labelledby="benefits-tab">
                                    <form action="{{ route('admin.update_setting') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="no_wa" class="form-label">Nomor WhatsApp</label>
                                            <input type="text" class="form-control" id="no_wa" name="no_wa"
                                                value="{{ $setting->no_wa ?? '' }}"
                                                placeholder="Masukkan nomor WA (Ex:6287799993333)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $setting->address ?? '' }}" placeholder="Masukkan alamat">
                                        </div>

                                        <div class="mb-3">
                                            <label for="hour_of_operation" class="form-label">Jam Operasional</label>
                                            <input type="text" class="form-control" id="hour_of_operation"
                                                name="hour_of_operation" value="{{ $setting->hour_of_operation ?? '' }}"
                                                placeholder="Ex: Senin-Jumat 08:00-17:00">
                                        </div>

                                        <div class="mb-3">
                                            <label for="maps_link" class="form-label">Link Maps</label>
                                            <input type="url" class="form-control" id="maps_link" name="maps_link"
                                                value="{{ $setting->maps_link ?? '' }}"
                                                placeholder="Masukkan link Google Maps">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

@push('scripts')
    <script>
        function updateGoldPricesNumber() {
            $('#goldPricesTable tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        function updateImportantNotesNumber() {
            $('#importantNotesTable tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        // Tambah row harga emas
        $('#addRow').click(function() {
            $('#goldPricesTable tbody').append(`
            <tr>
                <td></td>
                <td><input type="text" name="weight[]" class="form-control" placeholder="Berat (gr)"></td>
                <td><input type="text" name="base_price[]" class="form-control" placeholder="Harga Dasar"></td>
                <td><input type="text" name="price_pph[]" class="form-control" placeholder="Harga +PPh 0.25%"></td>
                <td><button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button></td>
            </tr>
        `);
            updateGoldPricesNumber();
        });

        $(document).on('click', '.removeRow', function() {
            $(this).closest('tr').remove();
            updateGoldPricesNumber();
        });

        // Tambah row keterangan penting
        $('#addImportantNote').click(function() {
            $('#importantNotesTable tbody').append(`
            <tr>
                <td></td>
                <td><textarea name="important_notes[]" class="form-control required" rows="3" placeholder="Masukkan keterangan penting..."></textarea></td>
                <td><button type="button" class="btn btn-danger btn-sm removeNote">Hapus</button></td>
            </tr>
        `);
            updateImportantNotesNumber();
        });

        $(document).on('click', '.removeNote', function() {
            $(this).closest('tr').remove();
            updateImportantNotesNumber();
        });

        $(document).on('input', '.price-format', function() {
            let value = $(this).val();
            value = value.replace(/\D/g, ''); // hapus semua karakter selain angka
            $(this).val(formatRupiah(value));
        });

        function formatRupiah(angka) {
            if (!angka) return '';
            return angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        const inputWA = document.getElementById('no_wa');

        // Fungsi untuk menambahkan - setiap 4 digit
        function formatWA(value) {
            // Hapus semua karakter non-digit
            value = value.replace(/\D/g, '');
            // Tambahkan - setiap 4 digit
            return value.replace(/(\d{4})(?=\d)/g, '$1-');
        }

        // Saat load pertama kali
        if (inputWA.value) {
            inputWA.value = formatWA(inputWA.value);
        }

        // Saat user mengetik
        inputWA.addEventListener('input', function(e) {
            let cursorPosition = inputWA.selectionStart;
            let originalLength = inputWA.value.length;

            inputWA.value = formatWA(inputWA.value);

            // Pertahankan posisi cursor
            let newLength = inputWA.value.length;
            cursorPosition += newLength - originalLength;
            inputWA.setSelectionRange(cursorPosition, cursorPosition);
        });

        // Update nomor awal jika sudah ada row
        updateGoldPricesNumber();
        updateImportantNotesNumber();
    </script>
@endpush
