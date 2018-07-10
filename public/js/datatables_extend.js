$(function() {
   $('body').tooltip({selector: '[data-toggle="tooltip"]'});
   $.extend( $.fn.dataTable.defaults, {
      autoWidth: false,
      columnDefs: [{ 
         orderable: false,
         width: '100px'
      }],
      dom: '<"datatable-header"fl><"datatable-scroll"tr><"datatable-footer"ip>',
      language: {
         search: '_INPUT_',
         searchPlaceholder: 'Type to filter...',
         lengthMenu: '_MENU_',
         paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
      },
      drawCallback: function () {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
         $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
         });
      },
      preDrawCallback: function() {
         $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
      }
   });
});

function deleteRow(url,redirect) {
   swal({
      title: "WARNING",
      text: "Yakin ingin menghapus data ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#EF5350",
      confirmButtonText: "Ya",
      cancelButtonText: "Batal",
      closeOnConfirm: true,
      closeOnCancel: true
  },
  function(isConfirm){
      if (isConfirm) {
         $.ajax({
            url: url,
            type: 'DELETE',
            data: { 
               _token: csrf_token
            }
         }).done(function(resp) {
            window.location = redirect;
         });
      }
  });
}