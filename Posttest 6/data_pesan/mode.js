$('#checkbox').on('click', function () {

    // Manipulasi pada Main konten
    var dark = document.getElementById('dark');
    dark.classList.toggle('active');
  
    // Manipulasi pada background
    var latar = document.getElementById('bg');
    latar.classList.toggle('dark-bg');
})

const header = document.getElementsByClassName('judul');

const bio = document.getElementsByClassName('datadiri');

const isi = document.getElementsByTagName('td');

const bg = document.getElementsByTagName('td');

const ingat = document.getElementsByClassName('peringatan');

const check = document.querySelector("input[id=checkbox]");
check.addEventListener('change', function () {
  if (this.checked) {
    alert('Anda beralih Ke Mode Gelap');

    // Manipulasi DOM Tulisan Judul
    header[0].innerHTML = 'Dark Gitar';

    // Manipulasi DOM Warna pada Judul
    header[0].style.color = 'wheat';

    ingat[0].style.color = 'white';

  } else {

    header[0].innerHTML = 'Galeri Gitar';
    header[0].style.color = 'white';

    alert('Anda beralih Ke Mode Terang');

    ingat[0].style.color = 'black';
  }
});