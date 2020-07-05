package studios.sperry.healthpile.models;

/**
 * Created by Martin Mbae on 05,July,2020.
 */
public class Notification {

    private String id, sender_id, message, date;


    public Notification(String id, String sender_id, String message, String date) {
        this.id = id;
        this.sender_id = sender_id;
        this.message = message;
        this.date = date;
    }

    public String getId() {
        return id;
    }

    public String getSender_id() {
        return sender_id;
    }

    public String getMessage() {
        return message;
    }

    public String getDate() {
        return date;
    }
}
