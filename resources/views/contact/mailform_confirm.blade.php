@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ内容確認</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="name" value="{{ $contact['name'] }}">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        <input type="hidden" name="sex" value="{{ $contact['sex'] }}">
                        <input type="hidden" name="pref" value="{{ $contact['pref'] }}">
                        <input type="hidden" name="contact" value="{{ $contact['contact'] }}">

                        <div class="row">
                            <label for="name" class="col-md-3 text-md-right">名前:</label>
                            <div class="col-md-9">
                                {{ $contact['name'] }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="email" class="col-md-3 text-md-right">メールアドレス:</label>
                            <div class="col-md-9">
                                {{ $contact['email'] }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="sex" class="col-md-3 text-md-right">性別:</label>
                            <div class="col-md-9">
                                {{ $contact['sex'] }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="cates" class="col-md-3 text-md-right">お問い合わせカテゴリ:</label>
                            <div class="col-md-9">
                                @isset( $contact['cates'])
                                 @foreach($contact['cates'] as $cates)
                                    {{ $cates }}
                                    <input type="hidden" name="cates[]" value="{{ $cates }}">
                                 @endforeach
                                @endisset
                            </div> 
                        </div>

                        <div class="row">
                            <label for="pref" class="col-md-3 text-md-right">お住まい:</label>
                            <div class="col-md-9">
                                {{ config('pref')[$contact['pref']] }}
                            </div>
                        </div>

                        <div class="row">
                            <label for="contact" class="col-md-3 text-md-right">お問い合わせ内容:</label>
                                <div class="col-md-9">
                                {!! nl2br($contact['contact']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="path" class="col-md-3 text-md-right">画像のアップロード:</label>
                                <div class="col-md-9">
                                    @isset($path)
                                    <img src="{{ Storage::url($path) }}" alt="" height="250" weight="100"> 
                                    <div>画像をアップロードできます。</div>
                                    @else
                                    <div>画像は選択されていません。</div>
                                    <input type="hidden" name="path" value="{{ $path }}">
                                    @endisset
                                
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-md-1 col-md-3">
                                <a href="{{ route('contact.index') }}" class="btn btn-info"><戻る</a> 
                            </div>

                            <div class="col-md-2 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    送信>
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

