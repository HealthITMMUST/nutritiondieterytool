package studios.sperry.healthpile.activities;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.text.Html;
import android.util.Base64;
import android.view.View;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.skydoves.expandablelayout.ExpandableLayout;
import com.squareup.picasso.Picasso;

import java.io.File;

import de.hdodenhof.circleimageview.CircleImageView;
import studios.sperry.healthpile.R;


public class SingleDiseaseInfo extends AppCompatActivity {
    private CircleImageView diseaseIconImageView;
    private TextView diseaseNameTextView, diseaseDescriptionTextView;

    String diseaseName, diseaseDescription, diseasePrevention, diseaseNutrition, diseaseIcon;

    ExpandableLayout expandableLayoutPreventions, expandableLayoutNutrition;

    TextView subTitlePreventions,contentPreventions;
    TextView subTitleNutrition,contentNutrition;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_single_disease_info);

        diseaseIconImageView = findViewById(R.id.diseaseIcon);
        diseaseNameTextView = findViewById(R.id.diseaseName);
        diseaseDescriptionTextView = findViewById(R.id.diseaseDescription);
        expandableLayoutPreventions = findViewById(R.id.expandableLayoutPreventions);
        expandableLayoutNutrition = findViewById(R.id.expandableLayoutNutrition);

//        imageString = getIntent().getStringExtra("imageString");
        diseaseName = getIntent().getStringExtra("diseaseName");
        diseaseDescription = getIntent().getStringExtra("diseaseDescription");
        diseasePrevention = getIntent().getStringExtra("diseasePrevention");
        diseaseNutrition = getIntent().getStringExtra("diseaseNutrition");
        diseaseIcon = getIntent().getStringExtra("diseaseIcon");

        diseaseNameTextView.setText(diseaseName);
        diseaseDescriptionTextView.setText(diseaseDescription);

//        File filePath = getFileStreamPath(imageString);
//        Drawable d = Drawable.createFromPath(filePath.toString());
//        diseaseIconImageView.setImageDrawable(d);

        Picasso.get()
                .load(diseaseIcon)
                .error(getDrawable(R.drawable.notfound))
                .placeholder(getDrawable(R.drawable.placeholder))
                .into(diseaseIconImageView);
        setUpExpandableLayoutPreventions();

    }

    private void setUpExpandableLayoutPreventions() {

        expandableLayoutPreventions.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (expandableLayoutPreventions.isExpanded()){
                    expandableLayoutPreventions.collapse();
                }else {
                    expandableLayoutPreventions.expand();
                }
            }
        });
        expandableLayoutNutrition.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (expandableLayoutNutrition.isExpanded()){
                    expandableLayoutNutrition.collapse();
                }else {
                    expandableLayoutNutrition.expand();
                }
            }
        });

        expandableLayoutPreventions.setParentLayoutResource(R.layout.single_disease_sub_title);
        expandableLayoutPreventions.setSecondLayoutResource(R.layout.single_disease_content);

        expandableLayoutNutrition.setParentLayoutResource(R.layout.single_disease_sub_title);
        expandableLayoutNutrition.setSecondLayoutResource(R.layout.single_disease_content);

        subTitlePreventions = expandableLayoutPreventions.parentLayout.findViewById(R.id.subTitle);
        contentPreventions = expandableLayoutPreventions.secondLayout.findViewById(R.id.content);

    subTitleNutrition = expandableLayoutNutrition.parentLayout.findViewById(R.id.subTitle);
        contentNutrition = expandableLayoutNutrition.secondLayout.findViewById(R.id.content);

        subTitlePreventions.setText("Preventions");
        subTitleNutrition.setText("Nutrition");
        if (android.os.Build.VERSION.SDK_INT >= android.os.Build.VERSION_CODES.N) {
            contentPreventions.setText(Html.fromHtml(diseasePrevention,Html.FROM_HTML_MODE_LEGACY));
            contentNutrition.setText(Html.fromHtml(diseaseNutrition,Html.FROM_HTML_MODE_LEGACY));
        } else {
            contentPreventions.setText(Html.fromHtml(diseasePrevention));
            contentNutrition.setText(Html.fromHtml(diseaseNutrition));
        }


    }

}
