@extends('layouts.app')
@section('content')
    <div>

        cái gì đấy

    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ),{
                    ckfinder:{
                            uploadUrl:'{{ route('ckeditor.upload').'?_token='.csrf_token()}}'
                        }
                } )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
@endsection