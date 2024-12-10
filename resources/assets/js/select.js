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
})();
