$('#checkbox').on('click', function () {

  // Manipulasi pada Main konten
  var dark = document.getElementById('dark');
  dark.classList.toggle('active');

  // Manipulasi pada background
  var latar = document.getElementById('bg');
  latar.classList.toggle('dark-bg');
})

const check = document.querySelector("input[id=checkbox]");

// Manipulasi DOM pada font
const namaGitar = document.getElementsByClassName('guitar-name');

// Manipulasi DOM pada judul
const header = document.getElementsByClassName('judul');

check.addEventListener('change', function () {
  if (this.checked) {

    // Pop Up Box
    alert('Anda beralih Ke Mode Gelap');

    for (let i = 0; i < 4; i++) {
      namaGitar[i].style.color = 'white';
    }

    // Manipulasi DOM Tulisan Judul
    header[0].innerHTML = 'Dark Gitar';

    // Manipulasi DOM Warna pada Judul
    header[0].style.color = 'wheat';

    $('.guitar-img').hide();
    $('.guitar-img').slideToggle(1000);
    $('.guitar-name').hide();
    $('.guitar-name').fadeIn(2000);

  } else {

    // Pop Up Box
    alert('Anda beralih Ke Mode Terang');

    for (let i = 0; i < 4; i++) {
      namaGitar[i].style.color = 'saddlebrown';
    }

    header[0].innerHTML = 'Galeri Gitar';
    header[0].style.color = 'white';

    $('.guitar-img').hide();
    $('.guitar-img').slideToggle(1000);
    $('.guitar-name').hide();
    $('.guitar-name').fadeIn(2000);
  }
});