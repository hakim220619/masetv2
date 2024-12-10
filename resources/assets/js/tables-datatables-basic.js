'use strict';

$(function () {
  var dt_row_grouping_table = $('.dt-row-grouping');

  var groupColumn = 1; // Grouping based on the third column
  if (dt_row_grouping_table.length) {
    var groupingTable = dt_row_grouping_table.DataTable({
      ajax: '/options/listDataOptions', // Data source
      columns: [
        { data: '' }, // For responsive control
        { data: 'label_header' }, // Column 1
        { data: 'label_option' }, // Column 2 (used for grouping)
        { data: 'type' }, // Column 3
        { data: 'state' }, // Column 4
        { data: 'created_at' }, // Column 5
        { data: '' } // Actions column
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          targets: 0,
          searchable: false,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        { visible: false, targets: groupColumn }, // Hide grouping column
        { visible: false, targets: 3 },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          searchable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="javascript:;" class="dropdown-item">Details</a>' +
              '<a href="javascript:;" class="dropdown-item">Archive</a>' +
              '<div class="dropdown-divider"></div>' +
              '<a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a>' +
              '</div>' +
              '</div>' +
              '<a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>'
            );
          }
        }
      ],
      order: [[groupColumn, 'asc']], // Initial order
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 7,
      lengthMenu: [7, 10, 25, 50, 75, 100],
      drawCallback: function (settings) {
        var api = this.api();
        var rows = api.rows({ page: 'current' }).nodes();
        var last = null;

        // Insert group headers with "Tambah" button aligned to the right
        api
          .column(groupColumn, { page: 'current' })
          .data()
          .each(function (group, i) {
            if (last !== group) {
              $(rows)
                .eq(i)
                .before(
                  '<tr class="group"><td colspan="8"><div style="display: flex; justify-content: space-between; align-items: center;"><span>' +
                    group +
                    '</span><button class="btn btn-primary btn-sm mt-1 tambah-btn" style="margin-right: 7%;">Tambah</button></div></td></tr>'
                );

              last = group;
            }
          });

        // Attach click event to the "Tambah" button
        $('.tambah-btn').on('click', function () {
          alert('Tambah button clicked');
        });
      }
    });

    // Toggle order by group on click
    $('.dt-row-grouping tbody').on('click', 'tr.group', function () {
      var currentOrder = groupingTable.order()[0];
      if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
        groupingTable.order([groupColumn, 'desc']).draw();
      } else {
        groupingTable.order([groupColumn, 'asc']).draw();
      }
    });
  }

  // Adjust DataTable filter and length input styles
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
