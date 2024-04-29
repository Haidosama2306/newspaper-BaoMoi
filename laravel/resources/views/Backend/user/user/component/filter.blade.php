<form action="{{ route('user.index') }}">
<div class="filter-wrapper">
    <div class="uk-flex uk-flex-middle uk-flex-space-between">
        <div class="perpage">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <select name="perpage" class="form-control input-sm perpage filter mr10" @php $perpage=request('perpage') ?: old('perpage') @endphp>
                    @for($i=20;$i<=200;$i+=20) 
                        <option {{ ($perpage == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }} bản ghi</option>
                    @endfor
                </select>

            </div>
        </div>
        <div class="action">
            <div class="uk-flex uk-flex-middle">
                
                @php
                    $user_catalogue_id = request('user_catalogue_id') ?: old('user_catalogue_id');
                @endphp
                <select name="user_catalogue_id" class="form-control mr10 setupSelect2">
                    <option value="0" selected="selected">Chọn nhóm thành viên</option>
                    @foreach($userCatalogues as $userCatalogue)
                        <option {{  ($user_catalogue_id == $userCatalogue->id) ? 'selected' : '' }} value="{{ $userCatalogue->id }}">{{ $userCatalogue->name }}</option>
                    @endforeach
                </select>
                <div class="uk-search uk-flex uk-flex-middle">
                    <div class="input-group">
                        <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}" placeholder="Nhập từ khóa bạn muốn tìm kiếm..."
                            class="form-control">
                        <span class="input-group-btn ">
                            <button type="submit" name="search" value="search" class="btn btn-primary mb0 btn-sm">Tìm
                                kiếm</button>
                        </span>
                    </div>
                </div>
                <a href="{{ route('user.store') }}" class="btn btn-danger ml10"><i class="fa fa-plus mr5"></i>Thêm mới thành viên</a>
            </div>
        </div>
    </div>
</div>
</form>