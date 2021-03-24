export default class Helpers {

    static lang   = $('meta[http-equiv="X-UA-Compatible"]').attr('lang');

    static $doc   = $(document);



    /**
     * Check if the value is empty
     * @param value
     * @returns {boolean}
     */
    static isEmpty(value){

        if (Helpers.isObject(value)){
            return Object.keys(value).length === 0;
        }
        return (typeof value === 'undefined' ||
            value === null ||
            value === 0 ||
            value === "" ||
            value === "0" ||
            value === false
        );
    }

    /**
     * Check if the value is Object
     * @param value
     * @returns {boolean}
     */
    static isObject(value){
        return value instanceof Object && !Array.isArray(value);
    }

    /**
     * Puts the first letter of the word in uppercase
     * @param value
     * @returns {string}
     */
    static ucfirst(value){
        return value.charAt(0).toUpperCase() + value.slice(1).toLowerCase();
    }


    /**
     * set input value
     * @param idForm
     * @param idInput
     * @param value
     */
    static setValue(idForm, idInput, value){
        $(idForm).find(idInput).val(value);
    }

    /**
     * GET value input
     * @param idForm
     * @param idInput
     * @returns {*|string|undefined|jQuery}
     */
    static getValue(idForm, idInput){
        return  $(idForm).find(idInput).val();
    }

    /**
     * get valid value input
     * @param idForm
     * @param idInput
     * @param funcValidValue
     * @returns {*|string|undefined|jQuery|null}
     */
    static getValidValue(idForm, idInput, funcValidValue){
        if (funcValidValue(idForm, idInput))
            return Helpers.getValue(idForm, idInput);
        return null;
    }

    /**
     *
     * @param data
     * @param auth_id
     * @param name_from
     * @param name_to
     */
    static renderMessages(data, auth_id, name_from, name_to){

        const content_messages = $('.panel-body');

        content_messages.empty();

        data.forEach(function(d){

            content_messages.append(`

                ${ d.from === auth_id ?
                `
                    <ul class="chat outgoing-message">
                            <li class="p-2 mb-2 rounded float-right w-75">
                                <span class="d-block font-weight-bold">${name_from}</span>
                                <span class="d-block">${d.content}</span>
                                <span class="d-block small">Date</span>
                            </li>
                    </ul>
                `
                :

                `
                     <ul class="chat received-message w-75">
                            <li class="p-2 mb-2 rounded">
                                <span class="d-block font-weight-bold">${name_to}</span>
                                <span class="d-block">${d.content}</span>
                                <span class="d-block small">Date</span>
                            </li>
                     </ul>
                `
            }

            `);

        });

    }

    /**
     *
     * @param idForm
     * @param idInput
     */
    static submitWithEnter(idForm, idInput) {

        Helpers.$doc.on('keypress', `${idForm} ${idInput}`, function (event) {

            if(event.which === 13){

                event.preventDefault();

                $(idForm).find("#submit").click();
            }
        });
    }



}
