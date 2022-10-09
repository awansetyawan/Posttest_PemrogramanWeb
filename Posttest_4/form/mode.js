$('#checkbox').on('click', function () {

    // Manipulasi pada Main konten
    var dark = document.getElementById('dark');
    dark.classList.toggle('active');
  
    // Manipulasi pada background
    var latar = document.getElementById('bg');
    latar.classList.toggle('dark-bg');
})

const bio = document.getElementsByClassName('datadiri');

const check = document.querySelector("input[id=checkbox]");
check.addEventListener('change', function () {
  if (this.checked) {
    alert('Anda beralih Ke Mode Gelap');

    bio[0].style.color = 'white';
  } else {

    alert('Anda beralih Ke Mode Terang');
    bio[0].style.color = 'black';
  }
});