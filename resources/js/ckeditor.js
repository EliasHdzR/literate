import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener("DOMContentLoaded", function () {
    ClassicEditor
        .create(document.querySelector('#contenido'), {
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