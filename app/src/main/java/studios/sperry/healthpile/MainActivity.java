package studios.sperry.healthpile;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.graphics.Bitmap;
import android.os.Bundle;
import android.util.Base64;

import java.io.ByteArrayOutputStream;
import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        ArrayList<Disease> diseaseArrayList = new ArrayList<>();
        diseaseArrayList.add(new Disease("Pneumonia", "This is a sample decription here",getDrawable(R.drawable.cure)));
        diseaseArrayList.add(new Disease("Malaria", "This is a sample decription here for malaria",getDrawable(R.drawable.cure2)));
        diseaseArrayList.add(new Disease("Asthma", "This is a sample decription here",getDrawable(R.drawable.learn)));

        DiseasesAdapter diseasesAdapter = new DiseasesAdapter(this, diseaseArrayList);
        RecyclerView recyclerView = findViewById(R.id.recyclerView);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.setItemAnimator(null);
        recyclerView.setAdapter(diseasesAdapter);

    }



}
