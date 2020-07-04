package studios.sperry.healthpile.activities.faqs;

import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

import studios.sperry.healthpile.R;

public class FaqActivity extends AppCompatActivity {

    Faqdapter faq_adapter;
    ArrayList<FAQ_item> faq_items;
    RecyclerView recyclerView;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_custom);
        faq_items = new ArrayList<>();

        recyclerView = findViewById(R.id.recyclerView);


        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }
        faq_items.add(new FAQ_item("D0 you share my information with other people", getString(R.string.app_name) + " does not share any information with any external organisation. The information you share with us is held with ultimate privacy."));
        faq_items.add(new FAQ_item("Can I use a different language in this app", getString(R.string.app_name) + " is only available in english. You will be notified once the support for other languages is available."));

        faq_adapter = new Faqdapter(faq_items);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.setAdapter(faq_adapter);


    }
}
