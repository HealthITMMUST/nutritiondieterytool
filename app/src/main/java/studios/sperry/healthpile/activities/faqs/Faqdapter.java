package studios.sperry.healthpile.activities.faqs;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.skydoves.expandablelayout.ExpandableLayout;

import java.util.ArrayList;

import studios.sperry.healthpile.R;


public class Faqdapter extends RecyclerView.Adapter<Faqdapter.ViewHolder> {

    ArrayList<FAQ_item> faq_items;

    public Faqdapter(ArrayList<FAQ_item> faq_items) {
        this.faq_items = faq_items;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_section,parent,false);

        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull final ViewHolder holder, int position) {

        FAQ_item faq_item = faq_items.get(position);

        holder.title.setText(faq_item.getTitle());
        holder.message.setText(faq_item.getMessage());

        holder.expandableLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (holder.expandableLayout.isExpanded()){
                    holder.expandableLayout.collapse();
                }else {
                    holder.expandableLayout.expand();
                }
            }
        });

    }

    @Override
    public int getItemCount() {
        return faq_items.size();
    }

    static class ViewHolder extends RecyclerView.ViewHolder{

        ExpandableLayout expandableLayout;

        TextView title, message;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            expandableLayout = itemView.findViewById(R.id.expandableLayout);
            expandableLayout.setParentLayoutResource(R.layout.item_section_parent);
            expandableLayout.setSecondLayoutResource(R.layout.layout_second1);

            title = expandableLayout.parentLayout.findViewById(R.id.title);
            message = expandableLayout.secondLayout.findViewById(R.id.textView);
        }
    }
}
