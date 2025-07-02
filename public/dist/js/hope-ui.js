/*
* Version: 1.2.0
* Template: Hope-Ui - Responsive Bootstrap 5 Admin Dashboard Template
* Author: iqonic.design
* Design and Developed by: iqonic.design
* NOTE: This file contains the script for initialize & listener Template.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------

------- Plugin Init --------

:: Sticky-Nav
:: Popover
:: Tooltip
:: Circle Progress
:: Progress Bar
:: NoUiSlider
:: CopyToClipboard
:: CounterUp 2
:: SliderTab
:: Data Tables
:: Active Class for Pricing Table
:: AOS Animation Plugin

------ Functions --------

:: Resize Plugins
:: Loader Init
:: Sidebar Toggle
:: Back To Top

------- Listners ---------

:: DOMContentLoaded
:: Window Resize
:: DropDown
:: Form Validation
:: Flatpickr
------------------------------------------------
Index Of Script
----------------------------------------------*/
"use strict";
/*---------------------------------------------------------------------
              Sticky-Nav
-----------------------------------------------------------------------*/
window.addEventListener('scroll', function () {
  let yOffset = document.documentElement.scrollTop;
  let navbar = document.querySelector(".navs-sticky")
  if (navbar !== null) {
    if (yOffset >= 100) {
      navbar.classList.add("menu-sticky");
    } else {
      navbar.classList.remove("menu-sticky");
    }
  }
});
/*---------------------------------------------------------------------
              Popover
-----------------------------------------------------------------------*/
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
if (typeof bootstrap !== typeof undefined) {
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })
}
/*---------------------------------------------------------------------
                Tooltip
-----------------------------------------------------------------------*/
if (typeof bootstrap !== typeof undefined) {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-sidebar-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
}
/*---------------------------------------------------------------------
              Circle Progress
-----------------------------------------------------------------------*/
const progressBar = document.getElementsByClassName('circle-progress')
if (typeof progressBar !== typeof undefined) {
  Array.from(progressBar, (elem) => {
    const minValue = elem.getAttribute('data-min-value')
    const maxValue = elem.getAttribute('data-max-value')
    const value = elem.getAttribute('data-value')
    const type = elem.getAttribute('data-type')
    if (elem.getAttribute('id') !== '' && elem.getAttribute('id') !== null) {
      new CircleProgress('#' + elem.getAttribute('id'), {
        min: minValue,
        max: maxValue,
        value: value,
        textFormat: type,
      });
    }
  })
}
/*---------------------------------------------------------------------
              Progress Bar
-----------------------------------------------------------------------*/
const progressBarInit = (elem) => {
  const currentValue = elem.getAttribute('aria-valuenow')
  elem.style.width = '0%'
  elem.style.transition = 'width 2s'
  if (typeof Waypoint !== typeof undefined) {
    new Waypoint({
      element: elem,
      handler: function () {
        setTimeout(() => {
          elem.style.width = currentValue + '%'
        }, 100);
      },
      offset: 'bottom-in-view',
    })
  }
}
const customProgressBar = document.querySelectorAll('[data-toggle="progress-bar"]')
Array.from(customProgressBar, (elem) => {
  progressBarInit(elem)
})
/*---------------------------------------------------------------------
                 noUiSlider
-----------------------------------------------------------------------*/
const rangeSlider = document.querySelectorAll('.range-slider');
Array.from(rangeSlider, (elem) => {
  if (typeof noUiSlider !== typeof undefined) {
    noUiSlider.create(elem, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    })
  }
})

const slider = document.querySelectorAll('.slider');
Array.from(slider, (elem) => {
  if (typeof noUiSlider !== typeof undefined) {
    noUiSlider.create(elem, {
      start: 50,
      connect: [true, false],
      range: {
        'min': 0,
        'max': 100
      }
    })
  }
})
/*---------------------------------------------------------------------
              Copy To Clipboard
-----------------------------------------------------------------------*/
const copy = document.querySelectorAll('[data-toggle="copy"]')
if (typeof copy !== typeof undefined) {
  Array.from(copy, (elem) => {
    elem.addEventListener('click', (e) => {
      const target = elem.getAttribute("data-copy-target");
      let value = elem.getAttribute("data-copy-value");
      const container = document.querySelector(target);
      if (container !== undefined && container !== null) {
        if (container.value !== undefined && container.value !== null) {
          value = container.value;
        } else {
          value = container.innerHTML;
        }
      }
      if (value !== null) {
        const elem = document.createElement("input");
        document.querySelector("body").appendChild(elem);
        elem.value = value;
        elem.select();
        document.execCommand("copy");
        elem.remove();
      }
    })
  });
}

/*---------------------------------------------------------------------
              CounterUp 2
-----------------------------------------------------------------------*/
if (window.counterUp !== undefined) {
  const counterUp = window.counterUp["default"];
  const counterUp2 = document.querySelectorAll('.counter')
  Array.from(counterUp2, (el) => {
    if (typeof Waypoint !== typeof undefined) {
      const waypoint = new Waypoint({
        element: el,
        handler: function () {
          counterUp(el, {
            duration: 1000,
            delay: 10,
          });
          this.destroy();
        },
        offset: "bottom-in-view",
      });
    }
  })
}
/*---------------------------------------------------------------------
              SliderTab
-----------------------------------------------------------------------*/
Array.from(document.querySelectorAll('[data-toggle="slider-tab"]'), (elem) => {
  if (typeof SliderTab !== typeof undefined) {
    new SliderTab(elem)
  }
})

let Scrollbar
if (typeof Scrollbar !== typeof null) {
  if (document.querySelectorAll(".data-scrollbar").length) {
    Scrollbar = window.Scrollbar
    Scrollbar.init(document.querySelector('.data-scrollbar'), {
      continuousScrolling: false,
    })
  }
}

/*---------------------------------------------------------------------
  Data tables
-----------------------------------------------------------------------*/
if ($.fn.DataTable) {
  if ($('[data-toggle="data-table"]').length) {
    const table = $('[data-toggle="data-table"]').DataTable({
      "dom": '<"row align-items-center"<"col-md-6" l><"col-md-6" f>><"table-responsive border-bottom my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">',
    });
  }
}
/*---------------------------------------------------------------------
  Active Class for Pricing Table
-----------------------------------------------------------------------*/
const tableTh = document.querySelectorAll('#my-table tr th')
const tableTd = document.querySelectorAll('#my-table td')
if (tableTh !== null) {
  Array.from(tableTh, (elem) => {
    elem.addEventListener('click', (e) => {
      Array.from(tableTh, (th) => {
        if (th.children.length) {
          th.children[0].classList.remove('active')
        }
      })
      elem.children[0].classList.add('active')
      Array.from(tableTd, (td) => td.classList.remove('active'))

      const col = Array.prototype.indexOf.call(document.querySelector('#my-table tr').children, elem);
      const tdIcons = document.querySelectorAll("#my-table tr td:nth-child(" + parseInt(col + 1) + ")");
      Array.from(tdIcons, (td) => td.classList.add('active'))
    })
  })
}
/*---------------------------------------------------------------------
              AOS Animation Plugin
-----------------------------------------------------------------------*/
if (typeof AOS !== typeof undefined) {
  AOS.init({
    startEvent: 'DOMContentLoaded',
    disable: function () {
      var maxWidth = 996;
      return window.innerWidth < maxWidth;
    },
    throttleDelay: 10,
    once: true,
    duration: 700,
    offset: 10
  });
}
/*---------------------------------------------------------------------
              Resize Plugins
-----------------------------------------------------------------------*/
const resizePlugins = () => {
  // sidebar-mini
  const tabs = document.querySelectorAll('.nav')
  const sidebarResponsive = document.querySelector('.sidebar-default')
  if (window.innerWidth < 1025) {
    Array.from(tabs, (elem) => {
      if (!elem.classList.contains('flex-column') && elem.classList.contains('nav-tabs') && elem.classList.contains('nav-pills')) {
        elem.classList.add('flex-column', 'on-resize');
      }
    })
    if (sidebarResponsive !== null) {
      if (!sidebarResponsive.classList.contains('sidebar-mini')) {
        sidebarResponsive.classList.add('sidebar-mini', 'on-resize')
      }
    }
  } else {
    Array.from(tabs, (elem) => {
      if (elem.classList.contains('on-resize')) {
        elem.classList.remove('flex-column', 'on-resize');
      }
    })
    if (sidebarResponsive !== null) {
      if (sidebarResponsive.classList.contains('sidebar-mini') && sidebarResponsive.classList.contains('on-resize')) {
        sidebarResponsive.classList.remove('sidebar-mini', 'on-resize')
      }
    }
  }
}
/*---------------------------------------------------------------------
              LoaderInit
-----------------------------------------------------------------------*/
const loaderInit = () => {
  const loader = document.querySelector('.loader')
  setTimeout(() => {
    loader.classList.add('animate__animated', 'animate__fadeOut')
    setTimeout(() => {
      loader.classList.add('d-none')
    }, 500)
  }, 500)
}
/*---------------------------------------------------------------------
              Sidebar Toggle
-----------------------------------------------------------------------*/
const sidebarToggle = (elem) => {
  elem.addEventListener('click', (e) => {
    const sidebar = document.querySelector('.sidebar')
    if (sidebar.classList.contains('sidebar-mini')) {
      sidebar.classList.remove('sidebar-mini')
    } else {
      sidebar.classList.add('sidebar-mini')
    }
  })
}

const sidebarToggleBtn = document.querySelectorAll('[data-toggle="sidebar"]')
const sidebar = document.querySelector('.sidebar-default')
if (sidebar !== null) {
  const sidebarActiveItem = sidebar.querySelectorAll('.active')
  Array.from(sidebarActiveItem, (elem) => {
    if (!elem.closest('ul').classList.contains('iq-main-menu')) {
      const childMenu = elem.closest('ul')
      childMenu.classList.add('show')
      const parentMenu = childMenu.closest('li').querySelector('.nav-link')
      parentMenu.classList.add('collapsed')
      parentMenu.setAttribute('aria-expanded', true)
    }
  })
}
Array.from(sidebarToggleBtn, (sidebarBtn) => {
  sidebarToggle(sidebarBtn)
})
/*---------------------------------------------------------------------------
                            Back To Top
----------------------------------------------------------------------------*/
const backToTop = document.getElementById("back-to-top")
if (backToTop !== null && backToTop !== undefined) {
  document.getElementById("back-to-top").classList.add("animate__animated", "animate__fadeOut")
  window.addEventListener('scroll', (e) => {
    if (document.documentElement.scrollTop > 250) {
      document.getElementById("back-to-top").classList.remove("animate__fadeOut")
      document.getElementById("back-to-top").classList.add("animate__fadeIn")
    } else {
      document.getElementById("back-to-top").classList.remove("animate__fadeIn")
      document.getElementById("back-to-top").classList.add("animate__fadeOut")
    }
  })
  // scroll body to 0px on click
  document.querySelector('#top').addEventListener('click', (e) => {
    e.preventDefault()
    window.scrollTo({ top: 0, behavior: 'smooth' });
  })
}
/*---------------------------------------------------------------------
              DOMContentLoaded
-----------------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', (event) => {
  resizePlugins()
  loaderInit()
});
/*---------------------------------------------------------------------
              Window Resize
-----------------------------------------------------------------------*/
window.addEventListener('resize', function (event) {
  resizePlugins()
});
/*---------------------------------------------------------------------
| | | | | DropDown
-----------------------------------------------------------------------*/
function darken_screen(yesno) {
  if (yesno == true) {
    if (document.querySelector('.screen-darken') !== null) {
      document.querySelector('.screen-darken').classList.add('active');
    }
  }
  else if (yesno == false) {
    if (document.querySelector('.screen-darken') !== null) {
      document.querySelector('.screen-darken').classList.remove('active');
    }
  }
}
function close_offcanvas() {
  darken_screen(false);
  if (document.querySelector('.mobile-offcanvas.show') !== null) {
    document.querySelector('.mobile-offcanvas.show').classList.remove('show');
    document.body.classList.remove('offcanvas-active');
  }
}
function show_offcanvas(offcanvas_id) {
  darken_screen(true);
  if (document.getElementById(offcanvas_id) !== null) {
    document.getElementById(offcanvas_id).classList.add('show');
    document.body.classList.add('offcanvas-active');
  }
}
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('[data-trigger]').forEach(function (everyelement) {
    let offcanvas_id = everyelement.getAttribute('data-trigger');
    everyelement.addEventListener('click', function (e) {
      e.preventDefault();
      show_offcanvas(offcanvas_id);
    });
  });
  if (document.querySelectorAll('.btn-close')) {
    document.querySelectorAll('.btn-close').forEach(function (everybutton) {
      everybutton.addEventListener('click', function (e) {
        close_offcanvas();
      });
    });
  }
  if (document.querySelector('.screen-darken')) {
    document.querySelector('.screen-darken').addEventListener('click', function (event) {
      close_offcanvas();
    });
  }
});
if (document.querySelector('#navbarSideCollapse')) {
  document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
    document.querySelector('.offcanvas-collapse').classList.toggle('open')
  })
}
/*---------------------------------------------------------------------
                                   Form Validation
-----------------------------------------------------------------------*/
// Example starter JavaScript for disabling form submissions if there are invalid fields
window.addEventListener('load', function () {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
  // Loop over them and prevent submission
  var validation = Array.prototype.filter.call(forms, function (form) {
    form.addEventListener('submit', function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
}, false);

(function () {
  /*----------------------------------------------------------
                             Flatpickr
  -------------------------------------------------------------*/
  const date_flatpickr = document.querySelectorAll('.date_flatpicker')
  Array.from(date_flatpickr, (elem) => {
    if (typeof flatpickr !== typeof undefined) {
      flatpickr(elem, {
        minDate: "today",
        dateFormat: "Y-m-d",
      })
    }
  })
  /*----------Range Flatpickr--------------*/
  const range_flatpicker = document.querySelectorAll('.range_flatpicker')
  Array.from(range_flatpicker, (elem) => {
    if (typeof flatpickr !== typeof undefined) {
      flatpickr(elem, {
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
      })
    }
  })
  /*------------Wrap Flatpickr---------------*/
  const wrap_flatpicker = document.querySelectorAll('.wrap_flatpicker')
  Array.from(wrap_flatpicker, (elem) => {
    if (typeof flatpickr !== typeof undefined) {
      flatpickr(elem, {
        wrap: true,
        minDate: "today",
        dateFormat: "Y-m-d",
      })
    }
  })
  /*-------------Time Flatpickr---------------*/
  const time_flatpickr = document.querySelectorAll('.time_flatpicker')
  Array.from(time_flatpickr, (elem) => {
    if (typeof flatpickr !== typeof undefined) {
      flatpickr(elem, {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
      })
    }
  })
  /*-------------Inline Flatpickr-----------------*/
  const inline_flatpickr = document.querySelectorAll('.inline_flatpickr')
  Array.from(inline_flatpickr, (elem) => {
    if (typeof flatpickr !== typeof undefined) {
      flatpickr(elem, {
        inline: true,
        minDate: "today",
        dateFormat: "Y-m-d",
      })
    }
  })

})();

// js biaya
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".edit-btn").forEach(button => {
        button.addEventListener("click", function() {
            let id = this.getAttribute("data-id");
            let nama = this.getAttribute("data-nama");
            let jumlah = this.getAttribute("data-jumlah");
            let status = this.getAttribute("data-status");

            document.getElementById("edit_nama_biaya").value = nama;
            document.getElementById("edit_jumlah").value = jumlah;
            document.getElementById("edit_status").value = status;

            let form = document.getElementById("editBiayaForm");
            form.action = `/admin/biaya/${id}`;
        });
    });
});


// js kelas
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const nama = this.getAttribute('data-nama');
            const kompetensi = this.getAttribute('data-kompetensi');

            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-kompetensi').value = kompetensi;

            document.getElementById('formEdit').setAttribute('action', '/admin/kelas/' + id);
        });
    });
});

// js detail siswa
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".detail-btn").forEach(button => {
        button.addEventListener("click", function() {
            document.getElementById("modalNama").textContent = this.dataset.nama;
            document.getElementById("modalNisn").textContent = this.dataset.nisn;
            document.getElementById("modalNis").textContent = this.dataset.nis;
            document.getElementById("modalKelas").textContent = this.dataset.kelas;
            document.getElementById("modalAlamat").textContent = this.dataset.alamat;
            document.getElementById("modalTelepon").textContent = this.dataset.telepon;
            document.getElementById("modalWali").textContent = this.dataset.wali;

            let fotoSrc = this.dataset.foto;
            let modalFoto = document.getElementById("modalFoto");

            if (!fotoSrc || fotoSrc.includes("null") || fotoSrc.endsWith('/')) {
                modalFoto.src = "{{ asset('storage/profiles/avatar.png') }}"; // Foto default
            } else {
                modalFoto.src = fotoSrc;
            }
        });
    });
});



// js search siswa
$(document).ready(function () {
    $('#search-input').on('keyup', function () {
        let query = $(this).val();
        $.ajax({
            url: "{{ route('admin.siswa.index') }}",
            type: "GET",
            data: { search: query },
            success: function (response) {
                $('#siswa-list').html(response.html);
            }
        });
    });
});

// js edit siswa

$(document).ready(function () {
    $('.edit-btn').click(function () {
        var siswaId = $(this).data('id');

        $.ajax({
            url: `/admin/siswa/${siswaId}/edit`,
            type: 'GET',
            success: function (response) {
                $('#edit-id').val(response.siswa.id);
                $('#edit-nisn').val(response.siswa.nisn);
                $('#edit-nis').val(response.siswa.nis);
                $('#edit-nama').val(response.siswa.nama);
                $('#edit-id_kelas').val(response.siswa.id_kelas);
                $('#edit-alamat').val(response.siswa.alamat);
                $('#edit-telepon').val(response.siswa.telepon);
                $('#edit-user_id').val(response.siswa.user_id);
                $('#editSiswaModal').modal('show');
            }
        });
    });

    $('#editSiswaForm').submit(function (e) {
        e.preventDefault();
        var siswaId = $('#edit-id').val();
        var formData = new FormData(this);

        $.ajax({
            url: `/admin/siswa/${siswaId}`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Data Siswa Berhasil Diperbarui');
                location.reload();
            },
            error: function (xhr) {
                alert('Terjadi kesalahan, silakan coba lagi');
            }
        });
    });
});

// preview image
function previewImage(event) {
    let input = event.target;
    let preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        }

        reader.readAsDataURL(input.files[0]);
    }
}
