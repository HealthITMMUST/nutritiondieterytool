package studios.sperry.healthpile.activities;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;

import com.google.android.material.navigation.NavigationView;

import studios.sperry.healthpile.R;
import studios.sperry.healthpile.activities.chat_box.ChatBotActivity;
import studios.sperry.healthpile.activities.faqs.FaqActivity;
import studios.sperry.healthpile.fragment.HomeFragment;

public class MainActivity extends AppCompatActivity {

    ActionBarDrawerToggle mActionBarDrawerToggle;
    DrawerLayout drawer;
    Toolbar toolbar;
    NavigationView navigationView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        drawer = findViewById(R.id.drawer_layout);
        navigationView = findViewById(R.id.nav_view);
        toolbar = findViewById(R.id.toolbar);

        setUpToolBar();
        setUpDrawer();
        setUpNavigation();

        HomeFragment homeFragment = new HomeFragment();
        loadSelectedFragment(homeFragment);

    }

    private void setUpToolBar() {
        setSupportActionBar(toolbar);
        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayShowHomeEnabled(true);
            getSupportActionBar().setHomeButtonEnabled(true);
        }
    }

    private void setUpDrawer() {
        mActionBarDrawerToggle = new ActionBarDrawerToggle(this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close) {
            @Override
            public void onDrawerOpened(View drawerView) {
                super.onDrawerOpened(drawerView);
                if (getSupportActionBar() != null)
                    mActionBarDrawerToggle.syncState();
            }

            @Override
            public void onDrawerClosed(View drawerView) {
                super.onDrawerClosed(drawerView);
                if (getSupportActionBar() != null)
                    mActionBarDrawerToggle.syncState();

            }
        };

        mActionBarDrawerToggle.syncState();
        drawer.addDrawerListener(mActionBarDrawerToggle);

    }

    private void setUpNavigation() {
        navigationView.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                int selectId = item.getItemId();
                switch (selectId) {
                    case R.id.nav_home:
                        HomeFragment homeFragment = new HomeFragment();
                        loadSelectedFragment(homeFragment);
                        drawer.closeDrawers();
                        break;

                    case R.id.pile_bot:
                        drawer.closeDrawers();
                        startActivity(new Intent(MainActivity.this, ChatBotActivity.class));

                        break;
                    case R.id.nav_faqs:
                        drawer.closeDrawers();
                        startActivity(new Intent(MainActivity.this, FaqActivity.class));

                        break;
                }
                return false;
            }
        });

    }


    private void loadSelectedFragment(Fragment selectedFragment){
        FragmentManager fragmentManager = getSupportFragmentManager();
        fragmentManager.beginTransaction().replace(R.id.nav_host_fragment,selectedFragment).commit();
    }

}
