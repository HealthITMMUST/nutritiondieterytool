package studios.sperry.healthpile.models;

import android.graphics.drawable.Drawable;

/**
 * Created by Martin Mbae on 03,July,2020.
 */
public class Disease {

    private String id, name,description,position,icon,prevention,nutrition,baseUrl;

    public Disease(String id, String name, String description, String position, String icon, String prevention, String nutrition, String baseUrl) {
        this.id = id;
        this.name = name;
        this.description = description;
        this.position = position;
        this.icon = icon;
        this.prevention = prevention;
        this.nutrition = nutrition;
        this.baseUrl = baseUrl;
    }

    public String getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getDescription() {
        return description;
    }

    public String getPosition() {
        return position;
    }

    public String getIcon() {
        return icon;
    }

    public String getPrevention() {
        return prevention;
    }

    public String getNutrition() {
        return nutrition;
    }

    public String getBaseUrl() {
        return baseUrl;
    }
}
