<script type="module">

    import Validator from "{{ asset('js/Validator.js') }}";

    $(function () {

        let error_name = false, error_email = false, error_phone = false, error_message,

            response  = new Object(),
            request   = new Object();

        const $doc = $(document);

        const phoneFieldFacultativeOrRequired    = "{{ $phoneFieldFacultativeOrRequired }}";

        $("#success").hide();

        $doc.on('keyup', '#name', function (event)
        {
            event.preventDefault();

            response = Validator.validationInput('#contactForm', this, '.error-name',
                {
                    requiredText: "{{ __('validation.required', ['attribute' => __('name')]) }}",
                    filterText: "{{ __('validation.regex', ['attribute' => __('name')]) }}"
                }, Validator.isName
            );

            error_name = response.error;
        });

        $doc.on('keyup', '#email', function (event)
        {
            event.preventDefault();

            response = Validator.validationInput('#contactForm', this, '.error-email',
                {
                    requiredText: "{{ __('validation.required', ['attribute' => __('email')]) }}",
                    filterText: "{{ __('validation.regex', ['attribute' => __('email')]) }}"
                }, Validator.isMail
            );

            error_email = response.error;
        });


        if (phoneFieldFacultativeOrRequired === "0"){

            error_phone = true;

            $doc.on('keyup', '#phone', function (event)
            {
                event.preventDefault();

                response = Validator.validationInputFacultative('#contactForm', this, '.error-phone',
                    {
                        filterText: "{{ __('validation.regex', ['attribute' => __('validation.attributes.phone')]) }}"
                    }, Validator.isPhone
                );

                error_phone = response.error;

            });
        }else{

            $doc.on('keyup', '#phone', function (event)
            {
                event.preventDefault();

                response = Validator.validationInput('#contactForm', this, '.error-phone',
                    {
                        requiredText: "{{ __('validation.required', ['attribute' => __('validation.attributes.phone')]) }}",
                        filterText: "{{ __('validation.regex', ['attribute' => __('validation.attributes.phone')]) }}"
                    }, Validator.isPhone
                );

                error_phone = response.error;

            });
        }

        $doc.on('keyup', '#message', function (event) {

            event.preventDefault();

            if (Validator.isEmpty(Validator.getValue('#contactForm', this))){

                Validator.error("#contactForm", '.error-message', "{{ __('validation.required', ['attribute' => __('message')]) }}");

                error_message = false;

                return;
            }

            error_message = true;

            Validator.clearError(this, '.error-message');
        });


        $doc.on('submit', '#contactForm', function (event) {

            event.preventDefault();

            if (error_name === false || error_email === false || error_message === false || error_phone === false) {

                Validator.requiredInput(this, '#name', '.error-name', {
                        requiredText: "{{ __('validation.required', ['attribute' => __('validation.attributes.name')]) }}"
                    }
                );

                Validator.requiredInput(this, '#email', '.error-email', {
                        requiredText: "{{ __('validation.required', ['attribute' => __('validation.attributes.email')]) }}"
                    }
                );

                if (phoneFieldFacultativeOrRequired === "1"){

                    Validator.requiredInput(this, '#phone', '.error-phone', {
                            requiredText: "{{ __('validation.required', ['attribute' => __('validation.attributes.phone')]) }}"
                        }
                    );
                }

                Validator.requiredInput(this, '#message', '.error-message', {
                        requiredText: "{{ __('validation.required', ['attribute' => __('message')]) }}"
                    }
                );

                return;
            }

            request.name  = Validator.getValidValue(this, '#name', Validator.isName);
            request.email = Validator.getValidValue(this, '#email', Validator.isMail);
            request.phone = Validator.getValidValue(this, '#phone', Validator.isPhone);
            request.message = Validator.getValue(this, '#message');

            Validator.requestAjax('POST', "{{ route_name('contact.submit') }}", FuncCallback, request);
        });


        function FuncCallback(response) {


            if (response.success){

                Validator.setValue("#contactForm", "#name, #email, #phone, #message", '');

                $("#success").html(response.message).show();

                return;
            }

            if(response.messages.email){
                Validator.error('#contactForm', '.error-email', response.messages.email);
            }

            if(response.messages.name){
                Validator.error('#contactForm', '.error-name', response.messages.name);
            }

            if(response.messages.phone){
                Validator.error('#contactForm', '.error-phone', response.messages.phone);
            }

            if(response.messages.message){
                Validator.error('#contactForm', '.error-message', response.messages.message);
            }
        }


    });
</script>
