<script type="module">

    import Validator from "{{ asset("js/Validator.js") }}";

    $(function () {

        let error_name = false, error_email = false, error_address = false, error_phone = false,

            response  = new Object(),
            request   = new Object(),

            canSubmit = true;

        const $doc    = $(document),
              $submit = $('#submit');

        $doc.on('blur', '#name', function (event)
        {
            event.preventDefault();

            response = Validator.validationInput('#UserForm', this, '.error-name',
                {
                    requiredText: "{{ __('validation.required', ['attribute' => __('name')]) }}",
                    filterText: "{{ __('validation.regex', ['attribute' => __('name')]) }}"
                }, Validator.isName
            );

            error_name = response.error;
        });

        $doc.on('blur', '#email', function (event)
        {
            event.preventDefault();

            response = Validator.validationInput('#UserForm', this, '.error-email',
                {
                    requiredText: "{{ __('validation.required', ['attribute' => __('email')]) }}",
                    filterText: "{{ __('validation.regex', ['attribute' => __('email')]) }}"
                }, Validator.isMail
            );

            error_email = response.error;
        });

        $doc.on('blur', '#address', function (event)
        {
            event.preventDefault();

            response = Validator.validationInput('#UserForm', this, '.error-address',
                {
                    requiredText: "{{ __('validation.required', ['attribute' => __('address')]) }}",
                    filterText: "{{ __('validation.regex', ['attribute' => __('address')]) }}"
                }, Validator.isText
            );

            error_address = response.error;
        });




    });
</script>
