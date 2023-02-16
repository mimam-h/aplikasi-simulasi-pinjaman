var jumlahPinjaman = document.querySelector("#jumlah");
var harian = document.querySelectorAll(".harian");
var bulanan = document.querySelectorAll(".bulanan");
var tenor = document.querySelector("#tenor");

default_state();

jumlahPinjaman.addEventListener("change", () => {
    number = parseInt(jumlahPinjaman.value);
    tenor.selectedIndex = -1;
    if (number > 0 && number < 20000000) {
        harian.forEach((e) => {
            e.style.display = "block";
        });
        bulanan.forEach((e) => {
            e.style.display = "none";
        });
    } else if (isNaN(number) || number <= 0) {
        harian.forEach((e) => {
            e.style.display = "none";
        });
        bulanan.forEach((e) => {
            e.style.display = "none";
        });
    } else {
        harian.forEach((e) => {
            e.style.display = "none";
        });
        bulanan.forEach((e) => {
            e.style.display = "block";
        });
    }
});

function default_state() {
    harian.forEach((e) => {
        e.style.display = "none";
    });
    bulanan.forEach((e) => {
        e.style.display = "none";
    });
}
