@extends('admin.layouts.app')
@section('content')

    <style>
        .img-wrapper {
            border-radius: 8px;
            position: relative;
            height: 230px;
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }
        .img-wrapper img {
            width: 150px; 
            height: 150px;
            margin-bottom: 10px;
        }
        .img-wrapper .name_file {
            margin: 5px 0 15px 20px;
        }
        .document-editor__editable-container .ck-editor__editable {
            width: 100%;
            min-height: 9cm;
        }
        .select2-container--default .select2-selection--single {
            height: 40px;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah data posting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Posting</li>
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
                        <form action="{{ url('') }}/admin/posting/update/{{ $data->id }}" method="POST" enctype="multipart/form-data" class="form-posting">
                            @csrf
                            @method('patch')
                            <div class="card shadow rounded pb-4">
                                <div class="card-header">
                                    <span>Edit data posting</span>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="judul">Judul Posting &emsp; </label>
                                                <input type="text" value="{{ $data->judul }}" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="masukan judul posting">
                                                @error('judul')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori">Kategori &emsp; </label>
                                                <select name="kategori" id="kategori" style="height: 45px" class="@error('kategori') is-invalid @enderror">
                                                    <option value=""></option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal &emsp; </label>
                                                <div class="input-group col-4">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-calendar-check"></i>
                                                    </span>
                                                    <input type="text" value="{{ $data->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="tanggal" id="tanggal">
                                                </div>
                                                @error('tanggal')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group img-wrapper">
                                                <label for="gambar">Gambar Utama &emsp; </label>
                                                <img alt="image" src="{{ asset("file_upload/$data->image") }}" id="showImage" class="shadow rounded">
                                                <input type="file" onchange="readURL(event)" class="form-control gambar @error('image') is-invalid @enderror" name="image">
                                                <small class="text-danger validate_size" hidden>Ukuran file terlalu besar. (max: 1.5MB)</small>
                                                @error('image')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="konten">Konten &emsp; </label>
                                                <div class="document-editor__editable-container">
                                                    <textarea name="konten" class="document-editor__editable" id="konten" style="width: 100%">{!! $data->konten !!}</textarea>
                                                </div>
                                                @error('konten')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kata_kunci">Kata Kunci &emsp; </label>
                                                <input name="kata_kunci" value="{{ $data->kata_kunci }}" id="kata_kunci" class="form-control @error('kata_kunci') is-invalid @enderror" placeholder="masukan kata kunci">
                                                @error('kata_kunci')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi &emsp; </label>
                                                <input name="deskripsi" value="{{ $data->deskripsi }}" id="deskripsi" class="form-control" placeholder="masukan deskripsi">
                                                @error('deskripsi')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="fa fa-check"></i> Sumbit
                                                </button>
                                                <button type="reset" class="btn btn-warning float-right mr-2">
                                                    <i class="fa fa-spinner"></i> Reset
                                                </button>
                                                <button type="button" class="btn btn-danger float-right mr-2 cancel">
                                                    <i class="fa fa-cancel"></i> Cancel
                                                </button>
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
        $(function() {
            cancel('.cancel');

            $('#kategori').select2({
                'width': '100%',
            });

            (function submitForm() {
                $('.form-posting').submit(function(e) {
                    var image_size = $('.gambar')[0].files[0].size;
                    var image_name = $('.gambar')[0].files[0].name;
                    var ext_allowed = ['jpg', 'jpeg', 'png'];
                    var ext = image_name.split('.');
                    var len = ext.length;
                    if(image_size > 1500000) {
                        e.preventDefault();
                        $('.validate_size').removeAttr('hidden');
                        $('.gambar').addClass('is-invalid');
                    }

                    if(!ext_allowed.includes(ext[len-1])) {
                        e.preventDefault();
                        $('.validate_size').html('yang anda upload bukan gambar!');
                        $('.validate_size').removeAttr('hidden');
                    }
                });
            })()
        });

        const readURL = function(event) {
            const img = document.getElementById("showImage");
            img.src = URL.createObjectURL(event.target.files[0]);
        }

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