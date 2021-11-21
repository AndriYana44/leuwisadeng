@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah data halaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Halaman</li>
                    <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('') }}/admin/desa/store" class="form-halaman" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow rounded pb-4">
                                <div class="card-header">
                                    <span>Tambah data halaman</span>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <div class="form-group mb-4">
                                                <label for="desa">Nama Desa</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-pen fa-fw"></i>
                                                    </span>
                                                    <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa" placeholder="masukan nama desa">
                                                </div>
                                                @error('desa')
                                                    <small class="text-danger float-left">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="gambar_utama">Gambar Utama Desa</label>
                                                <input type="file" class="form-control" name="gambar_utama" id="gambar_utama">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="foto_pimpinan">Foto Pimpinan</label>
                                                <input type="file" class="form-control" name="foto_pimpinan" id="foto_pimpinan">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="pimpinan">Nama Pimpinan</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-pen fa-fw"></i>
                                                    </span>
                                                    <input type="text" class="form-control @error('pimpinan') is-invalid @enderror" name="pimpinan" placeholder="masukan nama pimpinan">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 d-block">
                                                <label for="alamat">Alamat Desa</label>
                                                <textarea name="alamat" id="alamat" cols="30" class="form-control" rows="4"></textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="email">Email Desa</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-envelope fa-fw"></i>
                                                    </span>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="masukan nama email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Profil Umum Desa &emsp; </label>
                                                <div class="document-editor__editable-container">
                                                    <textarea name="profil" id="profil" class="document-editor__editable" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Struktur Desa &emsp; </label>
                                                <div class="document-editor__editable-container">
                                                    <textarea name="struktur" id="struktur" class="document-editor__editable" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Rencana Strategis Desa &emsp; </label>
                                                <div class="document-editor__editable-container">
                                                    <textarea name="rencana" id="rencana" class="document-editor__editable" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Demografi Desa &emsp; </label>
                                                <div class="document-editor__editable-container">
                                                    <textarea name="demografi" id="demografi" class="document-editor__editable" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="judul">Kegiatan Desa &emsp; </label>
                                                <div class="document-editor__editable-container">
                                                    <textarea name="kegiatan" id="kegiatan" class="document-editor__editable" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group float-right">
                                                <button type="button" class="btn btn-danger cancel">
                                                    <i class="fa fa-times"></i> Cancel</button>
                                                <button type="reset" class="btn btn-warning">
                                                    <i class="fa fa-spinner"></i> Reset</button>
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fa fa-check"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        cancel('.cancel');
        class MyUploadAdapter {
            constructor( loader ) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            // Aborts the upload process.
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open( 'POST', "{{ route('upload') }}", true );
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const errorSize = `Ukuran file/gambar terlalu besar. (max: 1.5mb)`;

                if(file.size > 1500000) {
                    xhr.addEventListener( 'error', () => reject( errorSize ) );
                }
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : errorSize );
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve( {
                        default: response.url
                    } );
                } );

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            // Prepares the data and sends the request.
            _sendRequest( file ) {
                // Prepare the form data.
                const data = new FormData();

                data.append( 'upload', file );

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send( data );
            }
        }

        // ...

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter( loader );
            };
        }

        // ...
        function ckeditor(el) {
            ClassicEditor
                .create( document.querySelector(el), {
                    extraPlugins: [ MyCustomUploadAdapterPlugin ],
                } )
                .catch( error => {
                    console.log( error );
                } );
        }

        ckeditor('#profil');
        ckeditor('#struktur');
        ckeditor('#rencana');
        ckeditor('#demografi');
        ckeditor('#kegiatan');
    </script>
@endsection