@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah data agenda</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Agenda</li>
                    <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <style>
            .document-editor__editable-container .ck-editor__editable {
                width: 100%;
                min-height: 9cm;
            }
        </style>

        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('') }}/admin/agenda/update/{{ $data->id }}" class="form-agenda" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card shadow rounded pb-4">
                                <div class="card-header">
                                    <span>Tambah data agenda</span>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="judul">Judul Agenda</label>
                                                    <input type="text" name="judul" value="{{ $data->judul }}" class="form-control" id="judul" placeholder="masukan judul agenda">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-3">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fa fa-calendar-check"></i>
                                                        </span>
                                                        <input type="text" value="{{ $data->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="tanggal" id="tanggal">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12">
                                                    <label for="judul">Konten &emsp; </label>
                                                    <div class="document-editor__editable-container">
                                                        <textarea name="konten" id="konten" class="document-editor__editable" cols="30" rows="10">{{ $data->konten }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group float-right">
                                                <button type="button" class="btn btn-danger cancel">
                                                    <i class="fa fa-times"></i> Cancel</button>
                                                <button type="reset" class="btn btn-warning">
                                                    <i class="fa fa-spinner"></i> Reset</button>
                                                <button type="submit" class="btn btn-primary"> 
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
        $('#tanggal').datepicker();
        (function setDateValue() {
            const date = new Date();
            $('#tanggal').val(`${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`)
        })();

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

        ClassicEditor
            .create( document.querySelector( '#konten' ), {
                extraPlugins: [ MyCustomUploadAdapterPlugin ],
                // ...
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
@endsection