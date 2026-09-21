<div id="collapseFilter" class="collapse bg-white mb-5">
    <form action="javascript:void(0);" id="data-table-filter" data-filter-table="#news-table">
        <div class="row fw-bold text-capitalize">
            <div class="col-xl-2 col-md-6 col-12">
                <label>{{ localize('from_date') }}</label>
                <input type="text" name="from_date" id="from_date" class="form-control date_picker"
                    placeholder="{{ localize('from_date') }}" autocomplete="off" />
            </div>
            <div class="col-xl-2 col-md-6 col-12">
                <label>{{ localize('to_date') }}</label>
                <input type="text" name="to_date" id="to_date" class="form-control date_picker"
                    placeholder="{{ localize('to_date') }}" autocomplete="off" />
            </div>
            <div class="col-xl-2 col-md-6 col-12">
                <label>{{ localize('category') }}</label>
                <select name="other_page" id="other_page" class="form-control select-basic-single"
                    data-placeholder="{{ localize_uc('select_category') }}" data-allow-clear="true">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-2 col-md-6 col-12">
                <label>{{ localize('sub_category') }}</label>
                <select name="sub_category_id" id="sub_category_id" class="form-control select-basic-single"
                    data-placeholder="{{ localize_uc('select_sub_category') }}" data-allow-clear="true">
                    <option value=""></option>
                    @foreach ($subCategories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-2 col-md-6 col-12">
                <label> {{ localize('Custom_url') }}</label>
                <input type="text" name="title" class="form-control" />
            </div>
            <div class="col-xl-2 col-md-6 col-12">
                <label>{{ localize('reporter') }}</label>
                <select name="reporter_id" id="reporter_id" class="form-control select-basic-single"
                    data-placeholder="{{ localize_uc('select_reporter') }}" data-allow-clear="true">
                    <option value=""></option>
                    @foreach ($reporters as $reporter)
                        <option value="{{ $reporter->id }}">
                            {{ $reporter->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xl-2 col-md-6 col-12">
                <label><i class="fas fa-clock me-1"></i>{{ localize('schedule_status') ?: 'Schedule Status' }}</label>
                <select name="schedule_status" id="schedule_status" class="form-control select-basic-single"
                    data-placeholder="{{ localize_uc('select_status') ?: 'Select Status' }}" data-allow-clear="true">
                    <option value="">{{ localize('all') ?: 'All' }}</option>
                    <option value="published">{{ localize('published') ?: 'Published' }}</option>
                    <option value="scheduled">{{ localize('scheduled') ?: 'Scheduled' }}</option>
                    <option value="draft">{{ localize('draft') ?: 'Draft' }}</option>
                </select>
            </div>

            <div class="col-xl-2 col-md-2 align-self-end d-flex mt-2 mt-lg-0">
                <button type="submit" class="btn btn-success me-1">{{ localize('find') }}</button>
                <button type="reset" class="btn btn-danger">{{ localize('reset') }}</button>
            </div>
        </div>
    </form>
</div>
