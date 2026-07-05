import './bootstrap';

import Alpine from 'alpinejs';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const editorElement = document.querySelector('#editor');

    if (editorElement) {
        ClassicEditor
            .create(editorElement, {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'horizontalLine', 'pageBreak', '|',
                    'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    }
});