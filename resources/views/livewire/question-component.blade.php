<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><strong>All Question</strong></h5>
                    <button class="ml-3 btn btn-primary float-right" data-toggle="modal" data-target="#addQuestionModal"><i
                            class="fas fa-plus"></i> Add Question
                    </button>
                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input class=" btn btn-info float-right ml-3" name='file' type="file" > 
                        <button class="btn btn-info float-right" >Upload </button>
                    </form>

                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT All</th>
                                <th>STT</th>
                                <th> Môn</th>
                                <th> Bộ Đề</th>
                                <th>Câu Hỏi</th>
                                <th>Đáp Án 1</th>
                                <th style="display:none">ID Đáp Án 1</th>
                                <th>Đáp Án 2</th>
                                <th style="display:none">ID Đáp Án 2</th>
                                <th>Đáp Án 3</th>
                                <th style="display:none">ID Đáp Án 3</th>
                                <th>Đáp Án 4</th>
                                <th style="display:none">ID Đáp Án 4</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listQuestion as $item)
                                <tr>
                                    <td>{{ $item->IdCauHoi }}</td>
                                    <td> {{ $item->stt }}</td>
                                    <td>{{ $item->idMon == '1' ? 'Tin cơ bản' : 'Tin nâng cao' }}</td>
                                    <td> {{ $item->boDe }} </td>
                                    <td style="overflow: hiden">{!! $item->CauHoi !!}</td>
                                    @foreach ($listAnswer as $value)
                                        @if ($item->IdCauHoi == $value->idCauHoi)
                                            <td>
                                                <input type="checkbox" {{ $value->isTrue == true ? 'checked' : '' }}
                                                    disabled>
                                                {!! $value->DapAn !!}
                                            </td>
                                            <td style="display:none">{{ $value->idDapAn }}</td>
                                        @endif
                                    @endforeach
                                    <td><a
                                            href="{{ route('editQuestion', ['id' => $item->IdCauHoi]) }}"class="btn btn-secondary btn-sm ml-3"><i
                                                class="fas fa-tools"></i> Sửa
                                        </a>
                                        <a
                                            href="{{ route('deleteQuestion', ['id' => $item->IdCauHoi]) }}"class="btn btn-danger btn-sm ml-3"><i
                                                class="fas fa-trash-alt"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="container">
                        {{ $listQuestion->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>


            {{-- <h2>{{ $this->count }}</h2> --}}
        </div>
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm câu hỏi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('postQuestion') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="question" class="col-3">Câu Hỏi:</label>
                        <div class='col-12'>
                            <textarea type="text" id='question'name=question></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="IDMon" class="col-3">Môn:</label>
                        <div class='col-9'>
                            <select class="custom-select" style="" id="inputGroupSelect01"
                                aria-placeholder="CHỌN BÀI THI" name='selectAdd'>
                                <option value="1">Tin cơ bản</option>
                                <option value="2">Tin nâng cao</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="IDMon" class="col-3">Bộ Đề:</label>
                        <div class='col-9'>
                            <input type="text" name="boDe" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stt" class="col-3">STT bộ đề:</label>
                        <div class='col-9'>
                            <input type="text" name="stt" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="answer1" class="col-3">câu trả lời 1:</label>

                        <div class="d-flex ">
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="1" style="width:25px"
                                    name="tF1[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">True</label>
                            </div>
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="0" style="width:24px"
                                    name="tF1[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">False</label>
                            </div>
                        </div>
                        <div class='col-12'>
                            <textarea style="max-width:auto" type="text" id="answer1" class='' name=answer1></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="answer2" class="col-3">câu trả lời 2:</label>
                        <div class="d-flex">
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="1" style="width:25px"
                                    name="tF2[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">true</label>
                            </div>
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="0"
                                    style="width:25px" name="tF2[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">false</label>
                            </div>
                        </div>
                        <div class='col-12'>
                            <textarea type="text" id="answer2" class='form-control' name=answer2></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="answer3" class="col-3">câu trả lời 3:</label>
                        <div class="d-flex">
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="1"
                                    style="width:25px" name="tF3[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">true</label>
                            </div>
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="0"
                                    style="width:25px" name="tF3[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">false</label>
                            </div>
                        </div>
                        <div class='col-12'>
                            <textarea type="text" id="answer3" class='form-control' name=answer3></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="answer4" class="col-3">câu trả lời 4:</label>
                        <div class="d-flex">
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="1"
                                    style="width:25px" name="tF4[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">true</label>
                            </div>
                            <div class="d-flex">
                                <input type="checkbox" id='check1' class="ml-3" value="0"
                                    style="width:25px" name="tF4[]" />
                                <label class="d-flex justify-content-center align-items-center ml-2"
                                    for="check1">false</label>
                            </div>
                        </div>
                        <div class='col-12'>
                            <textarea type="text" id="answer4" class='form-control' name=answer4></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#question'), {
            ckfinder: {
                uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
            }
        })
        .then(editor => {
            console.log(question);
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
