@extends('backend.layouts.app')
@section('title', localize('footer_setup', 'Footer Setup'))

@section('content')
    @include('backend.layouts.common.validation')
    @include('backend.layouts.common.message')

    @php
        $footerFieldLabels = [
            'bn' => [
                'editorial_heading' => 'সম্পাদকীয় বিভাগের শিরোনাম',
                'contact_heading' => 'যোগাযোগের শিরোনাম',
                'newsletter_heading' => 'নিউজলেটারের শিরোনাম',
                'newsletter_text' => 'নিউজলেটারের বর্ণনা',
                'quick_links_heading' => 'গুরুত্বপূর্ণ লিংকের শিরোনাম',
                'legal_heading' => 'নীতিমালা অংশের শিরোনাম',
                'email_placeholder' => 'ইমেইল ইনপুটের নির্দেশনা',
                'subscribe_label' => 'সাবস্ক্রাইব বাটনের লেখা',
                'subscribing_label' => 'লোডিং অবস্থায় বাটনের লেখা',
                'follow_heading' => 'সামাজিক মাধ্যম অংশের শিরোনাম',
                'editor_in_chief_label' => 'প্রধান সম্পাদক (লেবেল)',
                'editor_in_chief' => 'প্রধান সম্পাদক',
                'editor_label' => 'সম্পাদক (লেবেল)',
                'editor' => 'সম্পাদক',
                'publisher_label' => 'প্রকাশক (লেবেল)',
                'publisher' => 'প্রকাশক',
                'address_label' => 'যোগাযোগ (লেবেল)',
                'address' => 'ঠিকানা',
                'mobile_label' => 'মোবাইল (লেবেল)',
                'mobile' => 'মোবাইল',
                'email_label' => 'ইমেইল (লেবেল)',
                'email' => 'ইমেইল',
            ],
            'en' => [
                'editorial_heading' => 'Editorial section heading',
                'contact_heading' => 'Contact section heading',
                'newsletter_heading' => 'Newsletter heading',
                'newsletter_text' => 'Newsletter description',
                'quick_links_heading' => 'Useful links heading',
                'legal_heading' => 'Policies section heading',
                'email_placeholder' => 'Email input placeholder',
                'subscribe_label' => 'Subscribe button label',
                'subscribing_label' => 'Loading button label',
                'follow_heading' => 'Social links heading',
                'editor_in_chief_label' => 'Editor-in-Chief Label',
                'editor_in_chief' => 'Editor-in-Chief',
                'editor_label' => 'Editor Label',
                'editor' => 'Editor',
                'publisher_label' => 'Publisher Label',
                'publisher' => 'Publisher',
                'address_label' => 'Contact Label',
                'address' => 'Address',
                'mobile_label' => 'Mobile Label',
                'mobile' => 'Mobile',
                'email_label' => 'Email Label',
                'email' => 'Email',
            ],
        ];
    @endphp

    <div class="card mb-4">
        <div class="card-header">
            <h6 class="fs-17 fw-semi-bold mb-0">{{ localize('footer_setup', 'Footer Setup') }}</h6>
        </div>
        <div class="card-body">
            <form id="projectDetailsNonModalForm" action="{{ route('view_setup.footer_setup_store') }}" method="POST">
                @csrf

                <div class="row">
                    @foreach (['bn' => 'বাংলা ফুটার', 'en' => 'English Footer'] as $locale => $sectionTitle)
                        <div class="col-12 col-xl-6 mb-4">
                            <div class="border rounded h-100 p-3">
                                <h6 class="fw-semibold mb-3">{{ $sectionTitle }}</h6>

                                @foreach ($footerFieldLabels[$locale] as $field => $label)
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold" for="footer_{{ $locale }}_{{ $field }}">{{ $label }}</label>
                                        @if (in_array($field, ['address', 'newsletter_text'], true))
                                            <textarea class="form-control" id="footer_{{ $locale }}_{{ $field }}"
                                                name="footer[{{ $locale }}][{{ $field }}]" rows="2">{{ data_get($footerContent, $locale . '.' . $field) }}</textarea>
                                        @else
                                            <input class="form-control" id="footer_{{ $locale }}_{{ $field }}"
                                                name="footer[{{ $locale }}][{{ $field }}]"
                                                type="{{ $field === 'email' ? 'email' : 'text' }}"
                                                value="{{ data_get($footerContent, $locale . '.' . $field) }}">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-start">
                    <button type="submit" class="btn btn-success">{{ localize('update') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
