package studios.sperry.healthpile.activities.faqs;

public class FAQ_item {
    String title, message;

    public FAQ_item(String title, String message) {
        this.title = title;
        this.message = message;
    }

    public String getTitle() {
        return title;
    }


    public String getMessage() {
        return message;
    }

}
