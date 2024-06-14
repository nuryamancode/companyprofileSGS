<!-- Footer Start -->
<div class="container-fluid footer bg-dark wow fadeIn" data-wow-delay=".3s">
    <div class="container pt-5 pb-4">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <a href="{{route('home')}}">
                                        <h1 class="text-white fw-bold d-block"><img src="{{ asset('assets/img/SGSS.png') }}" class="img-fluid logo" style="width: 190px"  alt=""></h1>

                </a>
                <p class="mt-4 text-light">{{ GoogleTranslate::trans($about->description,\App::getLocale()) }}</p>
                <div class="d-flex hightech-link">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#" class="h3 text-primary"> {{ GoogleTranslate::trans('Short Menu',\App::getLocale()) }}</a>
                <div class="mt-4 d-flex flex-column short-link">
                    <a href="{{route('about')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>
                        {{ GoogleTranslate::trans('About Company',\App::getLocale()) }}
                    </a>
                    <a href="{{route('article')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>
                        {{ GoogleTranslate::trans('Article Company',\App::getLocale()) }}
                    </a>
                    <a href="{{route('service')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>
                        {{ GoogleTranslate::trans('Services Company',\App::getLocale()) }}
                    </a>
                    <a href="{{route('contact')}}" class="mb-2 text-white"><i class="fas fa-angle-right text-primary me-2"></i>
                        {{ GoogleTranslate::trans('Contact Company',\App::getLocale()) }}
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="#" class="h3 text-primary">{{ GoogleTranslate::trans('Contact Company',\App::getLocale()) }}</a>
                <div class="text-white mt-4 d-flex flex-column contact-link">
                    <a href="{{ $contact->link_gmaps }}" class="pb-3 text-light border-bottom border-white"><i
                            class="fas fa-map-marker-alt text-primary me-2"></i>{{ $contact->address }}</a>
                    @foreach ($contact->telepon as $item)
                        <a href="https://api.whatsapp.com/send?phone={{ $item->no_hp }}" class="py-3 text-light border-bottom border-white"><i
                                class="fas fa-phone-alt text-primary me-2"></i>{{ $item->nama }} -
                            {{ $item->no_hp }}</a>
                    @endforeach
                    <a href="mailto:{{ $contact->email }}" class="py-3 text-light border-bottom border-white"><i
                            class="fas fa-envelope text-primary me-2"></i>{{ $contact->email }}</a>
                </div>
            </div>
        </div>
        <hr class="text-light mt-5 mb-4">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <span class="text-light"><a href="#" class="text-primary"><i
                            class="fas fa-copyright text-primary me-2"></i>Satria Global Solusi</a></span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--<span class="text-light">Designed By NuryamanCode</span>-->
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
