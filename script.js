document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.getElementById("hamburger");
  const navLinks = document.getElementById("nav-links");

  hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navLinks.classList.toggle("active");
  });

  navLinks.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      hamburger.classList.remove("active");
      navLinks.classList.remove("active");
    });
  });

  // Form validation
  $(document).ready(function () {
    $("#contact-form").validate({
      rules: {
        fullName: {
          required: true,
          maxlength: 50,
        },
        email: {
          required: true,
          email: true,
          maxlength: 100,
        },
        phone: {
          required: true,
          phoneID: true,
          maxlength: 15,
        },
        message: {
          required: true,
          maxlength: 500,
        },
      },
      messages: {
        fullName: {
          required: "Nama lengkap wajib diisi",
          maxlength: "Maksimal 50 karakter",
        },
        email: {
          required: "Email wajib diisi",
          email: "Format email tidak valid",
          maxlength: "Maksimal 100 karakter",
        },
        phone: {
          required: "Nomor handphone wajib diisi",
          phoneID: "Format nomor handphone tidak valid",
          maxlength: "Maksimal 15 karakter",
        },
        message: {
          required: "Pesan wajib diisi",
          maxlength: "Maksimal 500 karakter",
        },
      },
      submitHandler: function (form) {
        alert("Form berhasil dikirim!");
        form.submit();
      },
    });

    // Custom validation for Indonesian phone numbers
    $.validator.addMethod("phoneID", function (phone_number, element) {
      return (
        this.optional(element) ||
        phone_number.match(/^(\+62|62|0)[8][0-9]{8,11}$/)
      );
    });

    // Menangani pengiriman form kontak
    $("#contact-form").submit(function (e) {
      e.preventDefault();

      // Mengambil data form
      var formData = {
        fullName: $("#fullName").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        message: $("#message").val(),
      };

      // Mengirim data dengan AJAX
      $.ajax({
        type: "POST",
        url: "process_contact.php",
        data: formData,
        dataType: "json",
        encode: true,
      })
        .done(function (data) {
          if (data.success) {
            // Tampilkan pesan sukses
            alert(data.message);
            $("#contact-form")[0].reset(); // Reset form
          } else {
            // Tampilkan pesan error
            alert("Error: " + data.message);
          }
        })
        .fail(function (data) {
          alert("Terjadi kesalahan saat mengirim pesan.");
        });
    });
  });
});
