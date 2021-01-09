// Display toast messages
window.livewire.on('feedback-success', ({ title = '¡Listo!' }) => {
    Swal.fire({
        theme: 'dark',
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