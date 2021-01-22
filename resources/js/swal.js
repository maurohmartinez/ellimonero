// Display toast messages
window.livewire.on('feedback-success', ({ title = '¡Listo!' }) => {
    Swal.fire({
        title: title,
        timer: 1700,
        timerProgressBar: true,
        icon: 'success',
        showConfirmButton: false,
        customClass: {
            'title': 'custom-title-swal'
        }
    });
});

window.livewire.on('feedback-error', ({ title = '¡Listo!' }) => {
    Swal.fire({
        title: title,
        timer: 3000,
        timerProgressBar: true,
        icon: 'error',
        showConfirmButton: false,
        customClass: {
            'title': 'custom-title-swal'
        }
    });
});

window.livewire.on('confirm-action', ({ emitTo, action, itemId, text = '¿Estás seguro?' }) => {
    Swal.fire({
        title: text,
        icon: 'warning',
        closeOnClickOutside: false,
        closeOnEsc: false,
        showCancelButton: false,
        showCancelButton: true,
        confirmButtonText: 'Si, eliminarlo',
        cancelButtonText: 'No, continuar',
        cancelButtonClass: 'custom-title-swal',
        confirmButtonClass: 'bg-danger custom-title-swal',
        reverseButtons: true,
        customClass: {
            'title': 'custom-title-swal',
            'text': 'custom-title-swal'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emitTo(emitTo, action, { itemId: itemId})
            livewire.call(action, id);
            return true;
        } else {
            return false;
        }
    });;
});