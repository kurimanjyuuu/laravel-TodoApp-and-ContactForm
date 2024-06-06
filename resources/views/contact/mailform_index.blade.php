@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.confirm') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">名前</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="control-label @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sex" class="col-md-3 col-form-label text-md-right">性別</label>

                            <div class="form-group row">
                            
                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="sex" type="radio" class="control-label @error('sex') is-invalid @enderror" name="sex" value="男性" {{ old('sex') == '男性' ? 'checked' : ''}} autofocus>
                                男性
                                <input id="sex" type="radio" class="control-label @error('sex') is-invalid @enderror" name="sex" value="女性" {{ old('sex') == '女性' ? 'checked' : ''}} autofocus>
                                女性
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-3 col-form-label text-md-right">お問い合わせカテゴリ<br>(複数選択可)</label>

                            <div class="col-md-9">
                            
                            
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @foreach($category as $cates)
                                    {{ $cates }}
                                    <input id="category" type="checkbox" class="control-label @error('category') is-invalid @enderror" name="cates[]" value="{{ $cates }}" autofocus>
                                @endforeach
                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="pref" class="col-md-3 col-form-label text-md-right">お住まい</label>

                            <div class="col-md-9">
                                <select id="pref" class="control-label @error('pref') is-invalid @enderror" name="pref" value="{{ old('pref') }}" autofocus>
                                    @error('pref')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @foreach($prefs as $index => $name)
                                        <option value="{{ $index }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="contact" class="col-md-3 col-form-label text-md-right">お問い合わせ内容</label>
                            <div class="col-md-9">
                                <textarea id="contact" class="form-control  @error('contact') is-invalid @enderror" name="contact" cols="30" rows="10"></textarea>

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-md-3 col-form-label text-md-right">画像のアップロード</label>
                            <div class="col-md-9">
                            <input id="path" type="file" class="control-label @error('path') is-invalid @enderror" name="path" autofocus>
                            
                                @error('path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    お問い合わせ内容の確認へ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection