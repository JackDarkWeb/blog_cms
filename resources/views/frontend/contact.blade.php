@extends("frontend.layouts.default", ["title" => "Contact"])


@section("page_header")

    <header class="masthead" style="background-image: url({{ asset( $contentContact->thumbnail ?? "frontend/img/contact-bg.jpg") }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>{{ $contentContact->title ?? "Contact Me"}}</h1>
                        <span class="subheading">{{ $contentContact->sub_title ?? "Have questions? I have answers."}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

@endsection




@section("content")

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-9 mx-auto">

                <p>
                    {{ $contentContact->description ?? " Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!" }}
                </p>

                <form method="post" action="{{ route_name("contact.submit") }}" name="sentMessage" id="contactForm" novalidate>

                    @csrf

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>{{ __("Name") }} <i style="color: red">*</i></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name." autocomplete="off">
                            <p class="help-block text-danger error-name"></p>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>{{ __("Email Address") }} <i style="color: red">*</i></label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                            <p class="help-block text-danger error-email"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group required col-xs-12 floating-label-form-group controls">
                            <label>{{ __("Phone Number") }}</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number." autocomplete="off">
                            <p class="help-block text-danger error-phone"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>{{ __("Message") }} <i style="color: red">*</i></label>
                            <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger error-message"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success" class="bg-success mb-2 p-2 text-bold text-white "></div>

                    <button type="submit" class="btn btn-primary" id="sendMessageButton">{{ __("Send") }}</button>
                </form>
            </div>

            <div class="col-lg-5 col-md-3 mx-auto">

                <p>
                    <span class="fa fa-home"></span>  @if(isset($contentContact->company_name) || setting_logo_and_app_name()["active_app_name"]) : <a class="text-primary" href="{{ route_name("home") }}">{{ $contentContact->company_name ?? setting_logo_and_app_name()["app_name"] }}</a> @endif
                </p>




                <p>
                    <span class="fa fa-location-arrow"></span>  @if(isset($contentContact->address)) : <a class="text-primary" href="#">{{ $contentContact->address }}</a>  @endif
                </p>




                <p>
                    <span class="fa fa-phone"></span>  @if(isset($contentContact->phone)) : <a class="text-primary" href="tel:{{ $contentContact->phone }}">{{ $contentContact->phone }}</a>  @endif
                </p>




                <p>
                    <span class="fa fa-globe"></span> @if(isset($contentContact->website)) : <a class="text-primary" href="{{ route_name("home") }}">{{ $contentContact->website }}</a> @else : <a class="text-primary" href="{{ route_name("home") }}"> {{ config('app.url') }} </a>@endif
                </p>





                <p>
                    <span class="fa fa-calendar-times"></span> @if(isset($contentContact->program)) : <a class="text-primary" href="#">{{ $contentContact->program }}</a>  @endif
                </p>


            </div>
        </div>
    </div>

@endsection

@section("scripts")

    @include("frontend.scripts.script_contact", ['phoneFieldFacultativeOrRequired' => $contentContact->required_facultative_field_phone ?? 1])

@endsection




