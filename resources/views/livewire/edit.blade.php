<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list question</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm câu hỏi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('postUpdate') }}">

                    @csrf
                    <div class="form-group row">
                        <label for="questionE" class="col-3">Câu Hỏi:</label>
                        <div class='col-12'>
                            <textarea type="text" id="questionE" class='form-control' name=questionE " > {!! $cauHoi->cauhoi !!} </textarea>
                        </div>
                    </div>
                    <div class="form-group row" style="display:none">
                        <label for="idQuestionE" class="col-3">ID Câu Hỏi:</label>
                        <div class='col-12'>
                            <input type="text" id="idQuestionE" class='form-control' name=idQuestionE "
                                value="{{ $cauHoi->IdCauHoi }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="IDMonE" class="col-3">Môn:</label>
                        <div class='col-12'>
                            <select class="custom-select" style="" id="inputGroupSelect01"
                                aria-placeholder="CHỌN BÀI THI" name='selectAddE'>
                                <option value="1" {{ $cauHoi->idMon == 1 ? 'selected' : '' }}>
                                    Tin cơ bản
                                </option>
                                <option value="2" {{ $cauHoi->idMon == 2 ? 'selected' : '' }}>
                                    Tin nâng cao
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="IDMonE" class="col-3">Bộ Đề:</label>
                        <div class='col-12'>
                            <input type="text" name="boDeE" class="form-control" value="{{ $cauHoi->boDe }}">
                        </div>
                    </div>
                       @foreach ($dapAn as $key=> $item)
                            <div class="form-group row">

                                <label for="answer{{ $key + 1 }}E" class="col-3">câu trả lời
                                    {{ $key + 1 }}:</label>
                                <div class="d-flex">
                                    <div class="d-flex">
                                        <input type="checkbox" id='check1' class="ml-3" value="1"
                                            style="width:25px" name="tF{{ $key + 1 }}E[]"
                                            {{ $item->isTrue == true ? 'checked' : '' }} />
                                        <label class="d-flex justify-content-center align-items-center ml-2"
                                            for="check1">true</label>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" id='check1' class="ml-3" value="0"
                                            style="width:25px" name="tF{{ $key + 1 }}E[]"
                                            {{ $item->isTrue == false ? 'checked' : '' }} />
                                        <label class="d-flex justify-content-center align-items-center ml-2"
                                            for="check1">false</label>
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <textarea type="text" id="answer{{ $key + 1 }}" class='form-control' name='answer{{ $key + 1 }}E'>{{ $item->DapAn }}</textarea>

                                    <input style="display:none" type="text" id="idAnswer{{ $key + 1 }}E"
                                        class='form-control' name='idAnswer{{ $key + 1 }}E'
                                        value="{{ $item->idDapAn }}">

                                </div>

                            </div>
                            @endforeach
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input class="btn btn-success" type="submit" value="Submit">
                            </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#questionE'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(questionE);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#answer1'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(answer1);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#answer2'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(answer2);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#answer3'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(answer3);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#answer4'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                }
            })
            .then(editor => {
                console.log(answer4);
            })
            .catch(error => {
                console.error(error);
            });
    </script>


</body>

</html>
