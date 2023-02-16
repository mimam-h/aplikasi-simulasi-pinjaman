<div class="container">
    <table class="content-table">
        <thead>
            <tr>
                <th colspan="2">Data Angsuran</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['daftar_angsuran'] as $angsuran) : ?>
                <tr>
                    <td>Angsuran ke-<?= $angsuran['nomor_angsuran'] ?></td>
                    <td><?= $angsuran['jumlah_cicilan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<form action="<?= BASEURL; ?>/pinjaman/search" method="post">
<div id="container" >
    <label for="pembayaran">
        Jumlah Pembayaran
    </label>
    <input type="number" name="pembayaran" id="pembayaran">
    <div id="submit-container">
    <input id="submit" type="submit" value="Bayar">
    </div>
</div>
</form>