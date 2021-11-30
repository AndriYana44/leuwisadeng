@extends('admin.layouts.app')
@section('content')
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

        <style>
            .document-editor__editable-container .ck-editor__editable {
                width: 100%;
                min-height: 9cm;
            }
            .select2-container--default .select2-selection--single {
                height: 40px;
            }
        </style>

        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('') }}/admin/posting/store" method="POST" class="form-posting" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow rounded pb-4">
                                <div class="card-header">
                                    <span>Tambah data posting</span>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="judul">Judul Posting &emsp; </label>
                                                <input type="text" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" name="judul" placeholder="masukan judul posting">
                                                @error('judul')
                                                    <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori">Kategori &emsp; </label>
                                                <select name="kategori" id="kategori" style="height: 45px" class="@error('kategori') is-invalid @enderror">
                                                    <option value=""></option>
                                                    @foreach ($kategori as $idx => $item)
                                                        <option value="{{ $item->id }}" {{ old('kategori') == $item->id ? 'selected' : '' }}>{{ $item->kategori }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori')
                                                    <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal &emsp; </label>
                                                <div class="input-group col-4">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-calendar-check"></i>
                                                    </span>
                                                    <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="tanggal" id="tanggal">
                                                </div>
                                                @error('tanggal')
                                                    <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">Gambar Utama &emsp; </label>
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" name="image">
                                                <small class="text-danger float-left mb-3 validate_size" hidden></small>
                                                @error('image')
                                                    <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="konten">Konten &emsp; </label>
                                                <div class="document-editor__editable-container">
                                                    <textarea name="konten" id="konten" class="document-editor__editable" cols="30" rows="10">{{ old('konten') }}</textarea>
                                                </div>
                                                @error('konten')
                                                    <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kata_kunci">Kata Kunci &emsp; </label>
                                                <input name="kata_kunci" id="kata_kunci" value="{{ old('kata_kunci') }}" class="form-control @error('kata_kunci') is-invalid @enderror" placeholder="masukan kata kunci">
                                                @error('kata_kunci')
                                                    <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi &emsp; </label>
                                                <input name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="masukan deskripsi">
                                                @error('deskripsi')
                                                    <small class="text-danger float-left mb-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="fa fa-check"></i> Sumbit
                                                </button>
                                                <button type="reset" class="btn btn-warning float-right mr-2">
                                                    <i class="fa fa-spinner"></i> Reset
                                                </button>
                                                <a href="{{ url('admin/posting') }}" class="btn btn-danger float-right mr-2 cancel">
                                                    <i class="fa fa-times"></i> Cancel
                                                </a>
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
            $('#kategori').select2({
                'width': '100%',
                'placeholder': 'pilih kategori',
            });

            $('#tanggal').datepicker();
            (function setDateValue() {
                const date = new Date();
                $('#tanggal').val(`${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`)
            })();
            
            (function submitForm() {
                $('.form-posting').submit(function(e) {
                    if($('input[type=file]')[0].files[0] == undefined) {
                        e.preventDefault();
                        $('.validate_size').html('Gambar tidak boleh kosong!');
                        $('.validate_size').removeAttr('hidden');
                        $('input[type=file]').addClass('is-invalid');
                    }else {
                        var image_size = $('input[type=file]')[0].files[0].size;
                        var image_name = $('input[type=file]')[0].files[0].name;
                        var ext_allowed = ['jpg', 'jpeg', 'png'];
                        var ext = image_name.split('.');
                        var len = ext.length;

                        if(image_size > 1500000) {
                            e.preventDefault();
                            $('.validate_size').removeAttr('hidden');
                            $('.validate_size').html('Ukuran file terlalu besar. (max: 1.5MB)');
                            $('input[type=file]').addClass('is-invalid');
                        }

                        if(!ext_allowed.includes(ext[len-1])) {
                            e.preventDefault();
                            $('.validate_size').html('yang anda upload bukan gambar!');
                            $('.validate_size').removeAttr('hidden');
                            $('input[type=file]').addClass('is-invalid');
                        }
                    }
                });
            })();
        });

        // ckeditor
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