import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll('.contenido'); // Selecciona todos los elementos con la clase .contenido
    elements.forEach(element => {
        ClassicEditor
            .create(element, {
                toolbar: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    '|',
                    'undo',
                    'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    });
});

