package studios.sperry.healthpile.activities.notifications;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.DefaultItemAnimator;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.View;
import android.widget.ProgressBar;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.gson.GsonBuilder;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Arrays;
import java.util.List;

import studios.sperry.healthpile.R;
import studios.sperry.healthpile.adapters.DiseasesAdapter;
import studios.sperry.healthpile.adapters.NotificationsAdapter;
import studios.sperry.healthpile.models.Disease;
import studios.sperry.healthpile.models.Notification;
import studios.sperry.healthpile.utils.Constants;

public class NotificationsActivity extends AppCompatActivity {


    private RecyclerView recyclerView;
    private ProgressBar progressBar;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notifications);

        recyclerView =findViewById(R.id.recyclerView);
        progressBar = findViewById(R.id.progressBar);



        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }

        getAllDiseases();

    }

    private void getAllDiseases() {

            progressBar.setVisibility(View.VISIBLE);
            recyclerView.setVisibility(View.GONE);

            String uri = Constants.BASE_URL + "api/notifications";
            StringRequest myReq = new StringRequest(Request.Method.GET,
                    uri, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    parseApplicantsDetails(response);
                    progressBar.setVisibility(View.GONE);

                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    progressBar.setVisibility(View.GONE);
                    recyclerView.setVisibility(View.GONE);
                }
            });

            RequestQueue queue = Volley.newRequestQueue(NotificationsActivity.this);
            queue.add(myReq);

    }


    private void parseApplicantsDetails(String response) {

        try {
            recyclerView.setVisibility(View.VISIBLE);
            JSONObject jsonObject = new JSONObject(response);
            if (jsonObject.getString("success").equalsIgnoreCase("true")) {
                String data = jsonObject.getString("data");
                JSONArray jsonArray1 = new JSONArray(data);
                List<Notification> notificationList = Arrays.asList(new GsonBuilder().create().fromJson(jsonArray1.toString(), Notification[].class));
                NotificationsAdapter notificationsAdapter = new NotificationsAdapter(NotificationsActivity.this, notificationList);

                RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(NotificationsActivity.this);
                recyclerView.setLayoutManager(mLayoutManager);
                recyclerView.setItemAnimator(new DefaultItemAnimator());
                recyclerView.setAdapter(notificationsAdapter);
            }

        } catch (JSONException e) {
            e.printStackTrace();
            recyclerView.setVisibility(View.GONE);
        }
    }
}
