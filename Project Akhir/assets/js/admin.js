$(function () {
  $(document).on('click', '.delete-btn', function (e) {

    // * DELETE BTN
    const text = $(this).data('text') ?? "Data akan dihapus!"
    Swal.fire({
      title: 'Apa anda yakin?',
      text,
      icon: 'warning',
      showCancelButton: true,
      reverseButtons: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = $(this).data('url');
      }
    })
  })


  // * REGISTRATION
  $("#examination_end_date").change(function () {
    const dates = $(this).val().split('-');
    $("#expiration_date").val(`${Number(dates[0]) + 3}-${dates[1]}-${dates[2]}`);
  })

  $(".regist-scope").each(function() {
    $(this).change(function() {
      const scopes = $("input.regist-scope:checked")
        .map(function(idx) {
          return `${$(this).data('code')}`
        })
        .toArray()
        .join(', ')
      $('#selected-scopes span').html(scopes)
    })
  })
})