package studios.sperry.healthpile.activities;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.util.Base64;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import java.io.File;

import de.hdodenhof.circleimageview.CircleImageView;
import studios.sperry.healthpile.R;


public class SingleDiseaseInfo extends AppCompatActivity {
    private CircleImageView diseaseIconImageView;
    private TextView diseaseNameTextView, diseaseDescriptionTextView;

    String imageString, diseaseName, diseaseDescription;
    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_disease_info);

        diseaseIconImageView = findViewById(R.id.diseaseIcon);
        diseaseNameTextView = findViewById(R.id.diseaseName);
        diseaseDescriptionTextView = findViewById(R.id.diseaseDescription);

        imageString = getIntent().getStringExtra("imageString");
        diseaseName = getIntent().getStringExtra("diseaseName");
        diseaseDescription = getIntent().getStringExtra("diseaseDescription");

        diseaseNameTextView.setText(diseaseName);
        diseaseDescriptionTextView.setText(diseaseDescription);

        File filePath = getFileStreamPath(imageString);
        Drawable d = Drawable.createFromPath(filePath.toString());
        diseaseIconImageView.setImageDrawable(d);

    }

}
