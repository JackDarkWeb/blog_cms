import Validator from "./Validator.js";

export default class PusherService {

    static publishMessage(auth_id, name_from, name_to){

        let pusher = new Pusher('e851073613e63c251b47', {
            cluster: 'eu'
        });

        let channel = pusher.subscribe('my-channel');

        channel.bind('my-event', function(data) {

            Validator.renderMessages(data, auth_id, name_from, name_to);
        });
    }
}
