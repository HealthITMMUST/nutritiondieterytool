package studios.sperry.healthpile.activities;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.util.Base64;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.skydoves.expandablelayout.ExpandableLayout;

import java.io.File;

import de.hdodenhof.circleimageview.CircleImageView;
import studios.sperry.healthpile.R;


public class SingleDiseaseInfo extends AppCompatActivity {
    private CircleImageView diseaseIconImageView;
    private TextView diseaseNameTextView, diseaseDescriptionTextView;

    String imageString, diseaseName, diseaseDescription;

    ExpandableLayout expandableLayoutPreventions, contentPreventions;

    TextView subTitlePreventions, introPreventions;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_disease_info);

        diseaseIconImageView = findViewById(R.id.diseaseIcon);
        diseaseNameTextView = findViewById(R.id.diseaseName);
        diseaseDescriptionTextView = findViewById(R.id.diseaseDescription);
        expandableLayoutPreventions = findViewById(R.id.expandableLayoutPreventions);

        imageString = getIntent().getStringExtra("imageString");
        diseaseName = getIntent().getStringExtra("diseaseName");
        diseaseDescription = getIntent().getStringExtra("diseaseDescription");

        diseaseNameTextView.setText(diseaseName);
        diseaseDescriptionTextView.setText(diseaseDescription);

        File filePath = getFileStreamPath(imageString);
        Drawable d = Drawable.createFromPath(filePath.toString());
        diseaseIconImageView.setImageDrawable(d);

        setUpExpandableLayoutPreventions();

    }

    private void setUpExpandableLayoutPreventions() {
        expandableLayoutPreventions.setParentLayoutResource(R.layout.item_section_parent);
        expandableLayoutPreventions.setSecondLayoutResource(R.layout.layout_second1);

        subTitlePreventions = expandableLayoutPreventions.parentLayout.findViewById(R.id.subTitle);
        introPreventions = expandableLayoutPreventions.secondLayout.findViewById(R.id.intro);
        contentPreventions = expandableLayoutPreventions.secondLayout.findViewById(R.id.content);

    }

}
