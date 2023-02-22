
const deleteEl = document.querySelectorAll('form.delete');

deleteEl.forEach((formDelete) => {
  formDelete.addEventListener('submit', function (event) {
    event.preventDefault();
    const doubleconfirm = event.target.classList.contains('double-confirm');
    Swal.fire({
      title: 'Are you sure ?',
      text: "Please confirm your request !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28A745',
      cancelButtonColor: '#DC3445',
      cancelButtonText: '<i class="fa-solid fa-arrow-left"></i> Back',
      confirmButtonText: 'Yes! <i class="fa-solid fa-thumbs-up"></i>',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    }).then((result) => {
      if (result.value) {

        // if double confirm
        if (doubleconfirm) {

          Swal.fire({
            title: 'Confirm request',
            html: "Please type <b>DELETE</b>",
            input: 'text',
            icon: 'error',
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            },
            inputPlaceholder: 'DELETE',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel',
            showLoaderOnConfirm: true,
            allowOutsideClick: () => !Swal.isLoading(),
            preConfirm: (txt) => {
              return (txt.toUpperCase() == "DELETE");
            },

          }).then((result) => {
            if (result.value) this.submit();
          })
        } else {
          this.submit();
        }


      }
    });


  });

});