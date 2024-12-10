/**
 * Page User List
 */

'use strict';

// Datatable (jquery)
$(function () {
  let borderColor, bodyBg, headingColor;

  if (isDarkStyle) {
    borderColor = config.colors_dark.borderColor;
    bodyBg = config.colors_dark.bodyBg;
    headingColor = config.colors_dark.headingColor;
  } else {
    borderColor = config.colors.borderColor;
    bodyBg = config.colors.bodyBg;
    headingColor = config.colors.headingColor;
  }

  // Variable declaration for table
  var dt_user_table = $('.datatables-users'),
    select2 = $('.select2'),
    select3 = $('.select3'),
    select4 = $('.select4'),
    select5 = $('.select5'),
    userView = baseUrl + 'app/user/view/account',
    statusObj = {
      1: { title: 'Pending', class: 'bg-label-warning' },
      2: { title: 'Active', class: 'bg-label-success' },
      3: { title: 'Inactive', class: 'bg-label-secondary' }
    };

  if (select2.length) {
    var $this = select2;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Status',
      dropdownParent: $this.parent()
    });
  }
  if (select3.length) {
    var $this = select3;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Role Structure',
      dropdownParent: $this.parent()
    });
  }
  if (select4.length) {
    var $this = select4;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Role Access',
      dropdownParent: $this.parent()
    });
  }
  if (select5.length) {
    var $this = select5;
    $this.wrap('<div class="position-relative"></div>').select2({
      placeholder: 'Select Role',
      dropdownParent: $this.parent()
    });
  }
  var id_role_sa = $('#id_role_rs').val();
  // Users datatable
  if (dt_user_table.length) {
    var i = 1;
    var dt_user = dt_user_table.DataTable({
      ajax: 'users/list',
      columns: [
        // columns according to JSON
        { data: 'no' },
        { data: 'nik' },
        { data: 'name' },
        { data: 'email' },
        { data: 'rs_name' },
        { data: 'ra_name' },
        { data: 'role_name' },
        { data: 'kontak' },
        { data: 'status' },
        { data: 'active' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // User Status
          targets: 8,
          render: function (data, type, full, meta) {
            var status = full['status'];
            var dataStatus = '';
            if (status == 'ACTIVE') {
              dataStatus = '<span class="badge bg-label-primary">' + status + '</span>';
            }
            if (status == 'INACTIVE') {
              dataStatus = '<span class="badge bg-label-warning">' + status + '</span>';
            }
            if (status == 'SUSPENDED') {
              dataStatus = '<span class="badge bg-label-danger">' + status + '</span>';
            }
            if (status == 'VERIFICATION') {
              dataStatus = '<span class="badge bg-label-info">' + status + '</span>';
            }
            return dataStatus;
          }
        },
        {
          // User Status
          targets: 9,
          render: function (data, type, full, meta) {
            var active = full['active'];
            var dataactive = '';
            if (active == 'ON') {
              dataactive = '<span class="badge bg-label-success">' + active + '</span>';
            }
            if (active == 'OFF') {
              dataactive = '<span class="badge bg-label-danger">' + active + '</span>';
            }
            return dataactive;
          }
        },
        {
          // Actions
          targets: 10,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function (data, type, row, meta) {
            // console.log(full);
            if (row.status == 'VERIFICATION') {
              return (
                '<div class="d-flex align-items-center">' +
                '<a href="javascript:;" class="text-body verification" data-uid="' +
                row.uid +
                '"><i class="ti ti-checks ti-sm mx-2" style="color: black;"></i></a>' +
                '</div>' +
                '</div>'
              );
            } else {
              return (
                '<div class="d-flex align-items-center">' +
                '<a href="javascript:;" class="text-body" onclick="OpenModalEditUsers(\'' +
                row.uid +
                "', '" +
                row.nik +
                "', '" +
                row.name +
                "', '" +
                row.email +
                "', '" +
                row.kontak +
                "', '" +
                row.role_structure +
                "', '" +
                row.role_access +
                "', '" +
                row.role +
                "', '" +
                row.status +
                "', '" +
                row.alamat +
                '\')"><i class="ti ti-edit ti-sm me-2" style="color: green;"></i></a>' +
                '<a href="javascript:;" class="text-body delete-record" data-uid="' +
                row.uid +
                '"><i class="ti ti-trash ti-sm mx-2" style="color: red;"></i></a>' +
                '<a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-sm mx-1"></i></a>' +
                '<div class="dropdown-menu dropdown-menu-end m-0">' +
                '<a  href="javascript:;" class="dropdown-item" onclick="OpenModalDetailUsers(\'' +
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
                '\')">View</a>' +
                '<a href="javascript:;" class="dropdown-item resetPassword" data-uid="' +
                row.uid +
                '">Reset Password</a>' +
                '</div>' +
                '</div>'
              );
            }
          }
        }
      ],
      // order: [[1, 'asc']],
      dom:
        '<"row me-2"' +
        '<"col-md-2"<"me-3"l>>' +
        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
        '>t' +
        '<"row mx-2"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-secondary dropdown-toggle mx-1 waves-effect waves-light',
          text: '<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-2" ></i>Print',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be print
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              },
              customize: function (win) {
                //customize print view for dark
                $(win.document.body)
                  .css('color', headingColor)
                  .css('border-color', borderColor)
                  .css('background-color', bodyBg);
                $(win.document.body)
                  .find('table')
                  .addClass('compact')
                  .css('color', 'inherit')
                  .css('border-color', 'inherit')
                  .css('background-color', 'inherit');
              }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-2" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'excel',
              text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-code-2 me-2"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-2" ></i>Copy',
              className: 'dropdown-item',
              exportOptions: {
                columns: [1, 2, 3, 4, 5],
                // prevent avatar to be display
                format: {
                  body: function (inner, coldex, rowdex) {
                    if (inner.length <= 0) return inner;
                    var el = $.parseHTML(inner);
                    var result = '';
                    $.each(el, function (index, item) {
                      if (item.classList !== undefined && item.classList.contains('user-name')) {
                        result = result + item.lastChild.firstChild.textContent;
                      } else if (item.innerText === undefined) {
                        result = result + item.textContent;
                      } else result = result + item.innerText;
                    });
                    return result;
                  }
                }
              }
            }
          ]
        },
        id_role_sa == '4'
          ? {
              className: 'btn btn-label-success mx-2 waves-effect waves-light uploadData',
              text: '<i class="ti ti-upload me-1 ti-xs"></i>Import',
              attr: {
                'data-bs-toggle': 'modal',
                'data-bs-target': '#uploadUsers'
              }
            }
          : '',
        {
          text: '<i class="ti ti-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add New User</span>',
          className: 'add-new btn btn-primary waves-effect waves-light',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#openModalAddUsers'
          }
        }
        // {
        //   text: '<i class="fa-solid fa-arrows-rotate me-1"></i><span class="d-none d-sm-inline-block">Refresh</span>',
        //   className: 'add-new btn btn-danger waves-effect waves-light'
        // }
      ],
      // For responsive popup
      // responsive: {
      //   details: {
      //     display: $.fn.dataTable.Responsive.display.modal({
      //       header: function (row) {
      //         var data = row.data();
      //         return 'Details of ' + data['nama'];
      //       }
      //     }),
      //     type: 'column',
      //     renderer: function (api, rowIdx, columns) {
      //       var data = $.map(columns, function (col, i) {
      //         return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
      //           ? '<tr data-dt-row="' +
      //               col.rowIndex +
      //               '" data-dt-column="' +
      //               col.columnIndex +
      //               '">' +
      //               '<td>' +
      //               col.title +
      //               ':' +
      //               '</td> ' +
      //               '<td>' +
      //               col.data +
      //               '</td>' +
      //               '</tr>'
      //           : '';
      //       }).join('');

      //       return data ? $('<table class="table"/><tbody />').append(data) : false;
      //     }
      //   }
      // },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(4)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role Structure </option></select>'
            )
              .appendTo('.user_role')
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
          .columns(5)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Role Access </option></select>'
            )
              .appendTo('.user_plan')
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
        // Adding status filter once table initialized
        this.api()
          .columns(8)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option></select>'
            )
              .appendTo('.user_status')
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
        this.api()
          .columns(9)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="FilterActive" class="form-select text-capitalize"><option value=""> Select Active </option></select>'
            )
              .appendTo('.user_active')
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

  // Delete Record
  $('.datatables-users tbody').on('click', '.delete-record', function () {
    var uid = $(this).data('uid');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert user!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete user!',
      customClass: {
        confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
        cancelButton: 'btn btn-label-secondary waves-effect waves-light'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: '/users/deleteProses/' + uid,
          success: function (response) {
            if (response.success == true) {
              dt_user.row($(this).parents('tr')).remove().draw();
              Swal.fire({
                width: 400,
                padding: 7,
                position: 'bottom-right',
                toast: true,
                icon: 'success',
                title: 'Success',
                text: `${response.message}`,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                backgroundColor: '#28a745',
                titleColor: '#fff'
              });
              $('.datatables-users').DataTable().ajax.reload();
              // location.reload();
            }
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: 'Cancelled Deleted :)',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success waves-effect waves-light'
          }
        });
      }
    });
  });
  $('.datatables-users tbody').on('click', '.verification', function () {
    var uid = $(this).data('uid');
    console.log(uid);
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to Verification user!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Verification user!',
      customClass: {
        confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
        cancelButton: 'btn btn-label-secondary waves-effect waves-light'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: '/users/verificationProses/' + uid,
          success: function (response) {
            if (response.success == true) {
              dt_user.row($(this).parents('tr')).remove().draw();
              Swal.fire({
                width: 400,
                padding: 7,
                position: 'bottom-right',
                toast: true,
                icon: 'success',
                title: 'Success',
                text: `${response.message}`,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                backgroundColor: '#28a745',
                titleColor: '#fff'
              });
              $('.datatables-users').DataTable().ajax.reload();
              // location.reload();
            }
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: 'Cancelled Verification :)',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success waves-effect waves-light'
          }
        });
      }
    });
  });
  $('.datatables-users tbody').on('click', '.resetPassword', function () {
    var uid = $(this).data('uid');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to reset password! Default Password 12345678",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Reset Password!',
      customClass: {
        confirmButton: 'btn btn-primary me-2 waves-effect waves-light',
        cancelButton: 'btn btn-label-secondary waves-effect waves-light'
      },
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: 'GET',
          dataType: 'json',
          url: '/users/resetPassword/' + uid,
          success: function (response) {
            if (response.success == true) {
              dt_user.row($(this).parents('tr')).remove().draw();
              Swal.fire({
                width: 400,
                padding: 7,
                position: 'bottom-right',
                toast: true,
                icon: 'success',
                title: 'Success',
                text: `${response.message}`,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                backgroundColor: '#28a745',
                titleColor: '#fff'
              });
              $('.datatables-users').DataTable().ajax.reload();
              // location.reload();
            }
          }
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
          title: 'Cancelled',
          text: 'Cancelled Reset Password :)',
          icon: 'error',
          customClass: {
            confirmButton: 'btn btn-success waves-effect waves-light'
          }
        });
      }
    });
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});

// Validation & Phone mask
(function () {
  // const phoneMaskList = document.querySelectorAll('.phone-mask'),
  addNewUserForm = document.getElementById('addNewUserForm');

  // Phone Number
  // if (phoneMaskList) {
  //   phoneMaskList.forEach(function (phoneMask) {
  //     new Cleave(phoneMask, {
  //       phone: true,
  //       phoneRegionCode: 'US'
  //     });
  //   });
  // }
  // Add New User Form Validation
  const fv = FormValidation.formValidation(addNewUserForm, {
    fields: {
      name: {
        validators: {
          notEmpty: {
            message: 'Please enter fullname'
          }
        }
      },
      nik: {
        validators: {
          notEmpty: {
            message: 'Please enter nik'
          }
        }
      },
      status: {
        validators: {
          notEmpty: {
            message: 'Please enter status'
          }
        }
      },

      alamat: {
        validators: {
          notEmpty: {
            message: 'Please enter Alamat'
          }
        }
      },
      password: {
        validators: {
          notEmpty: {
            message: 'Please enter password'
          },
          stringLength: {
            min: 4,
            message: 'Password must be more than 4 characters'
          }
        }
      },
      no: {
        validators: {
          notEmpty: {
            message: 'Please enter Contact'
          },
          stringLength: {
            min: 11,
            message: 'Contact must be more than 11 characters'
          }
        }
      },
      email: {
        validators: {
          notEmpty: {
            message: 'Please enter your email'
          },
          emailAddress: {
            message: 'The value is not a valid email address'
          }
        }
      },
      role_structure: {
        validators: {
          notEmpty: {
            message: 'Please enter Role Structure'
          }
        }
      },
      role_access: {
        validators: {
          notEmpty: {
            message: 'Please enter Role Access'
          }
        }
      },
      role: {
        validators: {
          notEmpty: {
            message: 'Please enter Role'
          }
        }
      },
      image: {
        validators: {
          notEmpty: {
            message: 'Please enter Image'
          }
        }
      }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap5: new FormValidation.plugins.Bootstrap5({
        // Use this for enabling/changing valid/invalid class
        eleValidClass: '',
        rowSelector: function (field, ele) {
          // field is the field name & ele is the field element
          return '.mb-3';
        }
      }),
      submitButton: new FormValidation.plugins.SubmitButton(),
      // Submit the form when all fields are valid
      // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
      autoFocus: new FormValidation.plugins.AutoFocus()
    }
  });
})();
