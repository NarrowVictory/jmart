  <script src="<?= base_url('') ?>public/template/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url('') ?>public/template/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url('') ?>public/template/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url('') ?>public/template/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= base_url('') ?>public/template/vendor/js/menu.js"></script>
  <script src="<?= base_url('') ?>public/template/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="<?= base_url('') ?>public/template/vendor/libs/sweetalert2/sweetalert2.js" />
  <script>
        navigator.serviceWorker.register("<?= base_url('') ?>public/service-worker.js")
  </script>
  <script>
  var formRegister = $('#form-register');

  formRegister.on('submit', function(e) {
        e.preventDefault(); // Mencegah tindakan bawaan submit
        $.ajax({
            url: "<?php echo base_url('register/proses2'); ?>",
            type: formRegister.attr('method'),
            data: formRegister.serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(response) {
              if (response.status == "success") {
                Swal.fire({
                  title: 'Success!',
                  text: response.message,
                  type: 'success',
                  customClass: {
                    confirmButton: 'btn btn-success'
                  },
                  buttonsStyling: false
                }).then((result) => {
                  if (result.isConfirmed) {
                  // Pengalihan ke halaman login
                  window.location.href = '<?= base_url('login') ?>'; // Ganti dengan URL halaman login Anda
                }
              });
              }else if(response.status == "error"){
                Swal.fire({
                 title: 'Error!',
                 text: response.message,
                 type: 'error',
                 customClass: {
                   confirmButton: 'btn btn-danger'
                 },
                 buttonsStyling: false
                });
              }else{
                Swal.fire({
                 title: 'Info!',
                 text: response.message,
                 type: 'info',
                 customClass: {
                   confirmButton: 'btn btn-info'
                 },
                 buttonsStyling: false
                });
              }
            },
            complete: function() {
                // Sembunyikan indikator loading di sini
                $("#loading").hide();
            }
        });
  });
</script>
</body>
</html>