<div class="container" style="width:100%;display:flex;justify-content:center;">
    <form action="<?= BASEURL; ?>/pinjaman/tambah" method="post">
        <h2>Form Peminjaman Uang</h2>
        <div class="row">
            <span>Nama</span> 
            <input type="text" name="nama" id="nama" />
        </div>
        <div class="row">
            <span>NIK</span> 
            <input type="text" name="nik" id="nik" maxlength="16" required />
        </div>
        <div class="row">
            <span>Alamat</span>
            <input type="text" name="alamat" id="alamat" />
        </div>
        <div class="row">
            <span>Nomor HP</span>
            <input type="text" name="handphone" id="nomorhp" maxlength="13" required />
        </div>
        <div class="row">
            <span>Jumlah Pinjaman</span>
            <input type="number" name="nilai_pinjaman" id="jumlah" />
        </div>
        <div class="row">
            <span>Tenor</span><select name="tenor" id="tenor">
                <div class="harian">
                    <option hidden selected></option>
                    <option class="harian" value="3h">3 hari</option>
                    <option class="harian" value="7h">7 hari</option>
                    <option class="harian" value="14h">14 hari</option>
                    <option class="harian" value="30h">30 hari</option>
                </div>
                <div class="bulanan">
                    <option class="bulanan" value="3b">3 bulan</option>
                    <option class="bulanan" value="6b">6 bulan</option>
                    <option class="bulanan" value="12b">12 bulan</option>
                </div>
            </select>
        </div>
        <button type="submit">submit</button>
    </form>
</div>