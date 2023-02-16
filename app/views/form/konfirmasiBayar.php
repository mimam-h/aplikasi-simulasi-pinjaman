<div class="container">
    <form action="<?= BASEURL;?>/pinjaman/bayar" method="post">
    <div id="container" >
        <label for="nik" class="">NIK</label>
        <input type="text" id="nik" class="" aria-describedby="hint" size="14" maxlength="16" name="nik">
        <div id="hint" class="">
            *NIK terdiri dari 16 digit angka.
        </div>
        <div id="submit-container">
        <input id="submit" type="submit" value="Cari Data">
        </div>
        </div>

    </form>
</div>