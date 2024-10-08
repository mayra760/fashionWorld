function previewImage() {
    const preview = document.querySelector('#preview');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.addEventListener('load', function() {
      preview.src = reader.result;
      preview.style.display = 'block';
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }


