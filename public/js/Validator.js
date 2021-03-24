import Helpers from "./Helpers.js";

export default class Validator extends Helpers{


    /**
     * Show the error if it exist
     * @param idForm
     * @param errorClass
     * @param text
     * @returns {*}
     */
    static error = (idForm, errorClass, text) => {

        return $(idForm).find(errorClass).html(text).show();

        /*
        * setTimeout(function(){
            return $(idForm).find(errorClass).html(text).show();
        }, 1000);

        return  $(idForm).find(errorClass).html(`${this.lang === 'fr' ? 'Vérification ...' : 'Checking ...'}`).show();*/
    }

    /**
     * Clear the error if it exist
     * @param idForm
     * @param errorClass
     * @returns {*}
     */
    static clearError = (idForm, errorClass) => {

        return $(errorClass).hide();

        /*
        * setTimeout(function () {
            return $(errorClass).hide();
        }, 1000);

        return $(idForm).find(errorClass).html(`${this.lang === 'fr' ? 'Vérification ...' : 'Checking ...'}`).show();*/
    }

    /**
     * Check if the value is name
     * @param idForm
     * @param idInput
     * @returns {boolean}
     */
    static isName(idForm, idInput){
        return /^[a-zA-Z -]+$/.test(Validator.getValue(idForm, idInput));
    }

    /**
     * Check if the value is mail
     * @param idForm
     * @param idInput
     * @returns {boolean}
     */
    static isMail(idForm, idInput){
        return /(^[a-z0-9.]+)@([a-z0-9])+(\.)([a-z]{2,4})/.test(Validator.getValue(idForm, idInput));
    }

    /**
     * Check if the value is phone
     * @param idForm
     * @param idInput
     * @returns {boolean}
     */
    static isPhone(idForm, idInput){
        return /(^\+[0-9]{3}|^00[0-9]{3})([0-9]{8,9}$)/.test(Validator.getValue(idForm, idInput));
    }


    /**
     *
     * @param idForm
     * @param idInput
     * @returns {boolean}
     */
    static isText(idForm, idInput){
        let value = Validator.getValue(idForm, idInput);
        return true;
        //return (/^[a-zA-Zéèêëíìîïñóòôöõúùûüýÿæ0-9 ,\-#$%@&]+$/.test(value) && value.length > 6);
    }


    /**
     * Check if the password value contain 6 characters
     * and must contain uppercase, lowercase and number
     * @param idForm
     * @param idInput
     * @returns {boolean}
     */
    static isPassword(idForm, idInput){
        let value = Validator.getValue(idForm, idInput);
        return !(!/[a-z]/.test(value) || !/[A-Z]/.test(value) || !/[0-9]/.test(value) || value.length < 6);
    }

    /**
     * Confirm the password
     * @param idForm
     * @param idPass
     * @param idConfirmPass
     * @param errorClass
     * @param errorText
     * @returns {boolean}
     */
    static confirmPassword(idForm, idPass, idConfirmPass, errorClass, errorText = {'confirmText' : ''}){

        let error;

        if (Validator.getValue(idForm, idPass) !== Validator.getValue(idForm, idConfirmPass)){
            Validator.error(idForm, errorClass, errorText.confirmText);
            error = false;
        }else {
            Validator.clearError(idForm, errorClass);
            error = true;
        }
        return error;
    }


    /**
     * Check if the input checkbox
     * @param idForm
     * @param idInput
     * @returns {boolean}
     */
    static checkBoxInput(idForm, idInput){
        return $(idForm).find(idInput).is($('input:checked'));
    }



    /**
     * Make the request Ajax
     * @param method
     * @param url
     * @param dynamic_function
     * @param data
     */
    static requestAjax(method, url, dynamic_function, data = []) {

        if(method === 'GET' || method === 'get'){
            fetch(
                url,
                {
                    headers: {
                        "Content-Type":"application/json",
                        "Accept":"application/json, text-plain, */*",
                        "X-Requested-With":"XMLHttpRequest",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                    },
                    method: method,
                }
            ).then(response => response.json())

                .then(response => {

                    dynamic_function(response);

                }).catch(error => {
                console.log(error)
            });

        }else{

            fetch(
                url,
                {
                    headers: {
                        "Content-Type":"application/json",
                        "Accept":"application/json, text-plain, */*",
                        "X-Requested-With":"XMLHttpRequest",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                    },
                    method: method,
                    body: JSON.stringify(data),
                }
            ).then(response => response.json())

                .then(response => {

                    dynamic_function(response);

                }).catch(error => {
                console.log(error)
            });
        }

    }
    /**
     *
     * @param method
     * @param url
     * @param func_callback
     */
    static requestAjaxElementary(method, url, func_callback){

        let formData = new FormData(),
            property = $('input[name="file"]').prop('files')[0];
        formData.append('file', property);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            async: true,
            success: func_callback
        });
    }

    /**
     *
     * @param idForm
     * @param idInput
     * @param errorClass
     * @param errorsText
     * @param funcValidValue
     * @returns {{error: boolean, value: string}}
     */
    static validationInput(idForm, idInput, errorClass, errorsText = {requiredText: '', filterText: ''}, funcValidValue){

        let error,
            value = Validator.getValue(idForm, idInput);

        if(Validator.isEmpty(value)){

            Validator.error(idForm, errorClass, errorsText.requiredText);

            error = false;

        }else if(!funcValidValue(idForm, idInput)){

            Validator.error(idForm, errorClass, errorsText.filterText);

            error = false;

        }else{

            Validator.clearError(idForm, errorClass);
            error = true;
        }

        return {value: value, error: error};
    }


    /**
     *
     * @param idForm
     * @param idInput
     * @param errorClass
     * @param errorsText
     * @param funcValidValue
     * @returns {{error: boolean, value: string}}
     */
    static validationInputFacultative(idForm, idInput, errorClass, errorsText = {filterText: ''}, funcValidValue){

        let error,
            value = Validator.getValue(idForm, idInput);

        if(Validator.isEmpty(value)){

            Validator.clearError(idForm, errorClass);
            error = true;

        }else if(!funcValidValue(idForm, idInput)){

            Validator.error(idForm, errorClass, errorsText.filterText);

            error = true;

        }else{

            Validator.clearError(idForm, errorClass);
            error = true;
        }

        return {value: value, error: error};
    }

    /**
     * Check if the input is empty
     * @param idForm
     * @param idInput
     * @param errorClass
     * @param errorText
     */
    static requiredInput(idForm, idInput, errorClass, errorText = {'requiredText' : ''}) {
        if (Validator.isEmpty(Validator.getValue(idForm, idInput)))
            return Validator.error(idForm, errorClass, errorText.requiredText);
    }



}
