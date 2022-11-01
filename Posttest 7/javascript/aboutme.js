$('#checkbox').on('click', function () {

  // Manipulasi pada Main konten
  var dark = document.getElementById('dark');
  dark.classList.toggle('active');

  // Manipulasi pada background
  var latar = document.getElementById('bg');
  latar.classList.toggle('dark-bg');
})

const header = document.getElementsByClassName('judul');

const nama = document.getElementsByClassName('name');

const nim = document.getElementsByClassName('nim');

const qoute = document.getElementsByClassName('qoute');

const check = document.querySelector("input[id=checkbox]");
check.addEventListener('change', function () {
  if (this.checked) {
    alert('Anda beralih Ke Mode Gelap');

    // Manipulasi DOM Tulisan Judul
    header[0].innerHTML = 'Dark Gitar';

    // Manipulasi DOM Warna pada Judul
    header[0].style.color = 'wheat';

    nama[0].style.color = 'wheat';

    nim[0].style.color = 'sienna';

    qoute[0].style.color = 'sienna';

    $('#profil').hide();
    $('#profil').fadeIn(1000);

    $('.name').hide();
    $('.name').fadeIn(1000);

    $('.nim').hide();
    $('.nim').fadeIn(1000);

    $('.qoute').hide();
    $('.qoute').fadeIn(1000);
  } else {

    alert('Anda beralih Ke Mode Terang');

    header[0].innerHTML = 'Galeri Gitar';
    header[0].style.color = 'white';

    nama[0].style.color = 'saddlebrown';

    nim[0].style.color = 'black';

    qoute[0].style.color = 'black';

    $('#profil').hide();
    $('#profil').fadeIn(1000);

    $('.name').hide();
    $('.name').fadeIn(1000);

    $('.nim').hide();
    $('.nim').fadeIn(1000);

    $('.qoute').hide();
    $('.qoute').fadeIn(1000);
  }
});