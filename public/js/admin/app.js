import Autoformat from "@ckeditor/ckeditor5-autoformat/src/autoformat";

ClassicEditor.create( document.querySelector( '#konten' ), {
    plugins: [ Autoformat ],
});