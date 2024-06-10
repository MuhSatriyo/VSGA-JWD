<div class="title-content p-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
            <h4>Form Mahasiswa</h4>
        </div>
        <div class="container text-left mt-3">
            <div class="row justify-content-around">
                <div class="col-4">
                    <!-- NIM -->
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control">
                    <!-- Nama -->
                    <label for="nama" class="form-label mt-3">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                    <!-- Jenis Kelamin -->
                    <label for="jenisKelamin" class="form-label mt-3">Jenis Kelamin</label>
                    <select name="jenisKelamin" id="jenisKelamin" class="form-select">
                        <?php
                        foreach($daftarJenisKelamin as $kelamin) {
                            echo "<option value='$kelamin'> $kelamin </option>";
                        }
                        ?>
                    </select>
                    <!-- Tempat Lahir -->
                    <label for="tempat-lahir" class="form-label mt-3">Tempat Lahir</label>
                    <input type="text" name="tempat-lahir" id="tempat-lahir" class="form-control">
                    <!-- Tanggal Lahir -->
                    <label for="tanggal-lahir" class="form-label mt-3">Tanggal Lahir</label>
                    <div class="row">
                        <div class="col">
                            <select name="tanggal" id="tanggal" class="form-select" required>
                                <option value="">Tanggal</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="bulan" id="bulan" class="form-select" required>
                                <option value="">Bulan</option>
                                <?php
                                $bulan = [
                                    1 => "Januari",
                                    2 => "Februari",
                                    3 => "Maret",
                                    4 => "April",
                                    5 => "Mei",
                                    6 => "Juni",
                                    7 => "Juli",
                                    8 => "Agustus",
                                    9 => "September",
                                    10 => "Oktober",
                                    11 => "November",
                                    12 => "Desember"
                                ];
                                foreach ($bulan as $num => $name) {
                                    echo "<option value='$num'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="tahun" id="tahun" class="form-select" required>
                                <option value="">Tahun</option>
                                <?php
                                $currentYear = date("Y");
                                for ($i = $currentYear; $i >= 1900; $i--) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- Agama -->
                    <label for="agama" class="form-label mt-3">Agama</label>
                    <select name="agama" id="agama" class="form-select">
                        <?php
                        foreach($daftarAgama as $agama) {
                            echo "<option value='$agama'> $agama </option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-4">
                    <!-- Alamat -->
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                    <!-- No Telepon -->
                    <label for="no-telepon" class="form-label">No. Telepon</label>
                    <input type="text" name="no-telepon" id="no-telepon" class="form-control">
                    <!-- email -->
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    <!-- Jurusan -->
                    <label for="jurusan" class="form-label mt-3">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-select">
                        <?php
                        foreach($daftarJurusan as $jurusan) {
                            echo "<option value='$jurusan'> $jurusan </option>";
                        }
                        ?>
                    </select>
                    <!-- Matakuliah -->
                    <label for="mataKuliah" class="form-label mt-3">Matakuliah</label>
                    <select name="mataKuliah" id="mataKuliah" class="form-select">
                        <?php
                        foreach($daftarMatakuliah as $mataKuliah) {
                            echo "<option value='$mataKuliah'> $mataKuliah </option>";
                        }
                        ?>
                    </select>
                    <!-- Nilai -->
                    <label for="nilai" class="form-labe mt-3">Nilai</label>
                    <input type="text" name="nilai" id="nilai" class="form-control">
                    <!-- Button Simpan -->
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <button type="submit" class="btn btn-primary mt-3 custom-button" name="btn-simpan" id="btn-simpan">Simpan</button>
                </div>
            </div>
        </div>