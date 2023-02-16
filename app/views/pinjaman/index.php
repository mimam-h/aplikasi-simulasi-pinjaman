<div class="container">
    <table class="content-table">
        <thead>
            <tr>
                <th colspan="2">Data Pinjaman</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nilai Pinjaman</td>
                <td><?= $data['pinjaman']['nilai_pinjaman']; ?></td>
            </tr>
            <tr>
                <td>Tenor</td>
                <?php if ($data['pinjaman']['nilai_pinjaman'] > 20000000) : ?>
                    <td>
                        <?= $data['pinjaman']['tenor']; ?> bulan
                    </td>
                <?php else : ?>
                    <td>
                        <?= $data['pinjaman']['tenor']; ?> hari
                    </td>
                <?php endif; ?>
            </tr>
            <tr>
                <td>Bunga</td>
                <?php if ($data['pinjaman']['nilai_pinjaman'] > 20000000) : ?>
                    <td>10%</td>
                <?php else : ?>
                    <td>0.5%</td>
                <?php endif; ?>
            </tr>
        </tbody>
    </table>
</div>
<div class="container">
    <table class="content-table">
        <thead>
            <tr>
                <th colspan="2">Data Angsuran</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['data_angsuran'] as $angsuran) : ?>
                <tr>
                    <td>Angsuran ke-<?= $angsuran['nomor_angsuran'] ?></td>
                    <td><?= $angsuran['jumlah_cicilan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- <a href="<?= BASEURL; ?>" class="" type="button">Kembali</a> -->