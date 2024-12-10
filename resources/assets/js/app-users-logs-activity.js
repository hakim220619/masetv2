/**
 * App User View - Account (jquery)
 */

$(function () {
  'use strict';

  // Variable declaration for table
  var dt_project_table = $('.datatable-users-activity');

  // Project datatable
  // --------------------------------------------------------------------
  if (dt_project_table.length) {
    var dt_project = dt_project_table.DataTable({
      ajax: 'setting/listUsersLogs', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: 'no' },
        { data: 'name' },
        { data: 'rs_name' },
        { data: 'ra_name' },
        { data: 'role_name' },
        { data: 'activity' },
        { data: 'action' },
        { data: 'ip' },
        { data: 'created_at' },
        {
          data: '',
          render: function (data, type, row, meta) {
            return (
              '<button class="btn btn-primary" onclick="OpenModalDetailUsers(\'' +
              row.uid +
              "', '" +
              row.image +
              "', '" +
              row.nik +
              "', '" +
              row.name +
              "', '" +
              row.email +
              "', '" +
              row.kontak +
              "', '" +
              row.rs_name +
              "', '" +
              row.ra_name +
              "', '" +
              row.role_name +
              "', '" +
              row.status +
              "', '" +
              row.alamat +
              '\')">Detail</button>' +
              ''
            );
          }
        }
      ],
      //   order: [[1, 'desc']],
      dom:
        '<"d-flex justify-content-between align-items-center flex-column flex-sm-row mx-4 row"' +
        '<"col-sm-4 col-12 d-flex align-items-center justify-content-sm-start justify-content-center"l>' +
        '<"col-sm-8 col-12 d-flex align-items-center justify-content-sm-end justify-content-center"f>' +
        '>t' +
        '<"d-flex justify-content-between mx-4 row"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      displayLength: 25,
      lengthMenu: [8, 10, 25, 50, 75, 100],
      language: {
        sLengthMenu: 'Show _MENU_',
        // search: '',
        searchPlaceholder: 'Search Project'
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(1)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="mmName" class="form-select text-capitalize"><option value=""> Select Name </option></select>'
            )
              .appendTo('.mmName')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
        // Adding plan filter once table initialized
        this.api()
          .columns(2)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="mmRole" class="form-select text-capitalize"><option value=""> Select Role Structure </option></select>'
            )
              .appendTo('.mmRole')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
        // Adding plan filter once table initialized
        this.api()
          .columns(3)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="mmRoleAccess" class="form-select text-capitalize"><option value=""> Select Role Access </option></select>'
            )
              .appendTo('.mmRoleAccess')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
              });
          });
      }
    });
  }
});
