package studios.sperry.healthpile;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.widget.TextView;

import com.robinhood.ticker.TickerView;

import java.text.MessageFormat;

import studios.sperry.healthpile.utils.BaseActivity;
import studios.sperry.healthpile.utils.Constants;
import studios.sperry.healthpile.utils.SharedPref;


public class LaunchActivity extends BaseActivity {
    private TickerView ticker3;
    TextView versioName;
    SharedPref sharedPref;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_launch);

        ticker3 = findViewById(R.id.ticker1);
        versioName = findViewById(R.id.versionName);
        sharedPref = new SharedPref(this);
        String versionName = BuildConfig.VERSION_NAME;

        versioName.setText(MessageFormat.format("Version {0}", versionName));
        ticker3.setPreferredScrollingDirection(TickerView.ScrollingDirection.ANY);
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                if (sharedPref.isFirstTime()){
                    Intent introIntent = new Intent(LaunchActivity.this, IntroActivity.class);
                    startActivity(introIntent);
                    finish();
                }else {
                    Intent clientIntent = new Intent(LaunchActivity.this, MainActivity.class);
                    startActivity(clientIntent);
                    finish();
                }
            }
        }, 5000);
    }

    @Override
    protected void onUpdate() {
        String name = (getString(R.string.app_name));
        ticker3.setText(name);
    }


}