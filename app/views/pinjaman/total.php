<div class="container">
    <table class="content-table">
        <thead>
            <tr>
                <th colspan="2">Data Angsuran</th>
            </tr>
        </thead>
        <tbody>
            <tr class="active-row">
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
                <td>Total Sisa Angsuran</td>
                <td>
                    <?= $data['data_angsuran']['total_angsuran'];  ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>