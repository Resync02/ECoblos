// Modal
  function showWarning(event) {
    event.preventDefault(); // Mencegah aksi default link
    const warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
    warningModal.show(); // Menampilkan modal
  }

