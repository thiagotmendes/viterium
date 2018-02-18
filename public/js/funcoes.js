jQuery(document).ready(function($) {
  $("#cep").mask("99999-999");
  $('#valor').maskMoney({symbol:"R$",decimal:",",thousands:"."});
  $('.crud-table').DataTable({
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json'
    }
  });
});
