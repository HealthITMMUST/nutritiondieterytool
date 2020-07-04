package studios.sperry.healthpile.fragment;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

import studios.sperry.healthpile.models.Disease;
import studios.sperry.healthpile.adapters.DiseasesAdapter;
import studios.sperry.healthpile.R;

public class HomeFragment extends Fragment {

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View root = inflater.inflate(R.layout.fragment_home, container, false);
        if (getActivity() != null) {

            ArrayList<Disease> diseaseArrayList = new ArrayList<>();
            diseaseArrayList.add(new Disease("Pneumonia", "This is a sample decription here", getActivity().getDrawable(R.drawable.cure)));
            diseaseArrayList.add(new Disease("Malaria", "This is a sample decription here for malaria", getActivity().getDrawable(R.drawable.cure2)));
            diseaseArrayList.add(new Disease("Asthma", "This is a sample decription here", getActivity().getDrawable(R.drawable.learn)));

            DiseasesAdapter diseasesAdapter = new DiseasesAdapter(getActivity(), diseaseArrayList);
            RecyclerView recyclerView = root.findViewById(R.id.recyclerView);
            recyclerView.setLayoutManager(new LinearLayoutManager(getActivity()));
            recyclerView.setItemAnimator(null);
            recyclerView.setAdapter(diseasesAdapter);
        }
        return root;
    }
}
