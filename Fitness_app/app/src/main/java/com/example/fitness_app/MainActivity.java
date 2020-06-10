package com.example.fitness_app;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import com.example.fitness_app.entities.AccessToken;
import com.example.fitness_app.entities.ApiError;
import com.example.fitness_app.entities.EndPointVariables;
import com.example.fitness_app.entities.Regime;
import com.example.fitness_app.entities.RegimesResponse;
import com.example.fitness_app.network.ApiService;
import com.example.fitness_app.network.RetrofitBuilder;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    @BindView(R.id.recyclerView)
    public RecyclerView recyclerView;
    private RecyclerView.Adapter adapter;

    private List<ListItem> listItems;

    Call<RegimesResponse> call;
    ApiService service;
    TokenManager tokenManager;

    private static final String TAG = "MainActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        ButterKnife.bind(this);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        listItems = new ArrayList<>();

        tokenManager = TokenManager.getInstance(getSharedPreferences("prefs", MODE_PRIVATE));

        if(tokenManager.getToken() == null){
            startActivity(new Intent(MainActivity.this, LoginActivity.class));
            finish();
        }

        service = RetrofitBuilder.createServiceWithAuth(ApiService.class, tokenManager);
        getRegimes();
    }

    void getRegimes(){
        call = service.regimes();
        call.enqueue(new Callback<RegimesResponse>() {
            @Override
            public void onResponse(Call<RegimesResponse> call, Response<RegimesResponse> response) {
                Log.w(TAG, "onResponse: " + response );

                if(response.isSuccessful()){
                    List<Regime> data = response.body().getData();
                    Collections.sort(data);
                    for (int i = 0; i<data.size(); i++){
                        ListItem item = new ListItem(
                                data.get(i).getId(),
                                data.get(i).getExercise_name(),
                                data.get(i).getExecution_date()
                        );
                        listItems.add(item);
                    }

                    adapter = new MyAdapter(listItems, getApplicationContext());
                    recyclerView.setAdapter(adapter);

                }else {
                    tokenManager.deleteToken();
                    startActivity(new Intent(MainActivity.this, LoginActivity.class));
                    finish();

                }

            }

            @Override
            public void onFailure(Call<RegimesResponse> call, Throwable t) {
                Log.w(TAG, "onFailure: " + t.getMessage() );
            }
        });

    }


//    @OnClick(R.id.btn_logout)
//    public void logout(){
//
//        call = service.logout();
//        call.enqueue(new Callback<AccessToken>() {
//            @Override
//            public void onResponse(Call<AccessToken> call, Response<AccessToken> response) {
//
//                Log.w(TAG, "onResponse: " + response);
//
//                if(response.isSuccessful()){
//                    tokenManager.deleteToken();
//                    startActivity(new Intent(MainActivity.this, LoginActivity.class));
//                }
//            }
//
//            @Override
//            public void onFailure(Call<AccessToken> call, Throwable t) {
//                Log.w(TAG, "onFailure: " + t.getMessage());
//            }
//        });
//
//    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        if (call != null) {
            call.cancel();
            call = null;
        }
    }
}
