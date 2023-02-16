<div class="container mt-5"></div>
<div class="row">
    <div class="col-6">
        <h3>Daftar Pengguna</h3>
        <?php foreach ($data['listUser'] as $user) : ?>
            <ul>
                <li>
                    <?= $user["nik"]; ?>
                    <?= $user["nama"]; ?>
                    <?= $user["alamat"]; ?>
                    <?= $user["handphone"]; ?>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>
</div>