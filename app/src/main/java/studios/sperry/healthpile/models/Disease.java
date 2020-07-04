package studios.sperry.healthpile.models;

import android.graphics.drawable.Drawable;

/**
 * Created by Martin Mbae on 03,July,2020.
 */
public class Disease {

    private String diseaseName, diseaseDescription;
    private Drawable diseaseIcon;

    public Disease(String diseaseName, String diseaseDescription, Drawable diseaseIcon) {
        this.diseaseName = diseaseName;
        this.diseaseDescription = diseaseDescription;
        this.diseaseIcon = diseaseIcon;
    }

    public String getDiseaseName() {
        return diseaseName;
    }

    public String getDiseaseDescription() {
        return diseaseDescription;
    }

    public Drawable getDiseaseIcon() {
        return diseaseIcon;
    }
}
