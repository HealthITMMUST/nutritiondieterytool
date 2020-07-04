package studios.sperry.healthpile.fragment;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.DefaultItemAnimator;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

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
import studios.sperry.healthpile.models.Disease;
import studios.sperry.healthpile.utils.Constants;

public class HomeFragment extends Fragment {

    private RecyclerView recyclerView;
    private ProgressBar progressBar;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_home, container, false);
        recyclerView = root.findViewById(R.id.recyclerView);
        progressBar = root.findViewById(R.id.progressBar);
        getAllDiseases();
        return root;
    }

    private void getAllDiseases() {

        if (getActivity() != null) {
            progressBar.setVisibility(View.VISIBLE);
            recyclerView.setVisibility(View.GONE);

            String uri = Constants.BASE_URL + "api/diseases/";
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

            RequestQueue queue = Volley.newRequestQueue(getActivity());
            queue.add(myReq);
        }
    }


    private void parseApplicantsDetails(String response) {

        try {
            recyclerView.setVisibility(View.VISIBLE);
            JSONObject jsonObject = new JSONObject(response);
            if (jsonObject.getString("success").equalsIgnoreCase("true")) {
                String data = jsonObject.getString("data");
                JSONArray jsonArray1 = new JSONArray(data);
                List<Disease> diseaseArrayList = Arrays.asList(new GsonBuilder().create().fromJson(jsonArray1.toString(), Disease[].class));
                DiseasesAdapter diseasesAdapter = new DiseasesAdapter(getActivity(), diseaseArrayList);

                RecyclerView.LayoutManager mLayoutManager = new LinearLayoutManager(getActivity());
                recyclerView.setLayoutManager(mLayoutManager);
                recyclerView.setItemAnimator(new DefaultItemAnimator());
                recyclerView.setAdapter(diseasesAdapter);
            }


        } catch (JSONException e) {
            e.printStackTrace();
            recyclerView.setVisibility(View.GONE);
        }
    }


}
