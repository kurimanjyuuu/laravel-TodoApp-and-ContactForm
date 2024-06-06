@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ありがとうございます<br>
                    お問い合わせメールを受け付けました
                </div> 
             
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
                            @foreach($contact['cates'] as $cates)
                                    {{ $cates }}
                            @endforeach
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
                            <label for="contact" class="col-md-3 text-md-right">画像:</label>
                                <div class="col-md-9">
                                    @isset($path)
                                    <img src="{{ Storage::url($path) }}" alt="" height="250" weight="100"> 
                                    <div>画像をアップロードできます。</div>
                                    @else
                                    <div>画像は選択されていません。</div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        

                <div class="form-group row">
                    <div class="offset-md-1 col-md-3">
                        <a href="{{ route('contact.index') }}" class="btn btn-info"><トップへ戻る</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
