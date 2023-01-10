$(function () {
  // * DATATABLE
  const DATATABLE_LANGUAGE = {
    "decimal": "",
    "emptyTable": "Tidak ada data",
    "info": "Tampilkan _START_ sampai _END_ dari _TOTAL_ data",
    "infoEmpty": "Data Kosong",
    "infoFiltered": "(filter dari _MAX_ total data)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Tampilkan _MENU_ data",
    "loadingRecords": "Loading...",
    "processing": "",
    "search": "Pencarian:",
    "zeroRecords": "Data tidak ditemukan",
    "paginate": {
      "first": "Pertama",
      "last": "Terakhir",
      "next": "Selanjutnya",
      "previous": "Sebelumnya"
    },
    "aria": {
      "sortAscending": ": activate to sort column ascending",
      "sortDescending": ": activate to sort column descending"
    }
  }
  $('.datatable').DataTable({
    language: DATATABLE_LANGUAGE
  });
  $('.datatable-min').DataTable({
    searching: false,
    paging: false,
    info: false,
    language: DATATABLE_LANGUAGE
  });
  // * SELECT2
  $('.select2').select2()
  // * QUILL
})