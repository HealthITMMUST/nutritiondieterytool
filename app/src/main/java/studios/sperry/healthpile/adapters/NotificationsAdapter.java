package studios.sperry.healthpile.adapters;

import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.util.Base64;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.squareup.picasso.Picasso;

import java.io.ByteArrayOutputStream;
import java.util.List;

import de.hdodenhof.circleimageview.CircleImageView;
import studios.sperry.healthpile.R;
import studios.sperry.healthpile.activities.SingleDiseaseInfo;
import studios.sperry.healthpile.models.Disease;
import studios.sperry.healthpile.models.Notification;

/**
 * Created by Martin Mbae on 03,July,2020.
 */
public class NotificationsAdapter extends RecyclerView.Adapter<NotificationsAdapter.ViewHolder> {
    private Context context;
    private  List<Notification> notificationList;

    public NotificationsAdapter(Context context, List<Notification> notificationList) {
        this.context = context;
        this.notificationList = notificationList;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view =  LayoutInflater.from(context).inflate(R.layout.item_message_received,parent, false);

        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, int position) {

        final Notification notification = notificationList.get(position);
//        holder.diseaseIcon.setImageDrawable(disease.getDiseaseIcon());
        holder.text_message_time.setText(notification.getDate());
        holder.text_message_body.setText(notification.getMessage());

    }


    @Override
    public int getItemCount() {
        return notificationList.size();
    }

    static class ViewHolder extends RecyclerView.ViewHolder {
        private TextView text_message_body, text_message_time;
        private View view;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            view = itemView;
            text_message_time = view.findViewById(R.id.text_message_time);
            text_message_body = view.findViewById(R.id.text_message_body);

        }
    }


}
