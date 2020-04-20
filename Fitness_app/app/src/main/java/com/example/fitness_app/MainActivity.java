package com.example.fitness_app;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;

import com.example.fitness_app.entities.AccessToken;
import com.example.fitness_app.entities.ApiError;
import com.example.fitness_app.network.ApiService;
import com.example.fitness_app.network.RetrofitBuilder;

import butterknife.ButterKnife;
import butterknife.OnClick;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    Call<AccessToken> call;
    ApiService service;
    TokenManager tokenManager;

    private static final String TAG = "MainActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        service = RetrofitBuilder.createService(ApiService.class);
        tokenManager = TokenManager.getInstance(getSharedPreferences("prefs", MODE_PRIVATE));

        ButterKnife.bind(this);
    }


    @OnClick(R.id.btn_logout)
    void logout(){
        call = service.logout();
        call.enqueue(new Callback<AccessToken>() {
            @Override
            public void onResponse(Call<AccessToken> call, Response<AccessToken> response) {

                Log.w(TAG, "onResponse: " + response);

                if(response.isSuccessful()){
                    tokenManager.deleteToken();
                    startActivity(new Intent(MainActivity.this, LoginActivity.class));
                }
            }

            @Override
            public void onFailure(Call<AccessToken> call, Throwable t) {
                Log.w(TAG, "onFailure: " + t.getMessage());
            }
        });

    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        if (call != null) {
            call.cancel();
            call = null;
        }
    }
}
