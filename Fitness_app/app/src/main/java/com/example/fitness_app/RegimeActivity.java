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
import com.example.fitness_app.entities.RegimeResponse;
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

public class RegimeActivity extends AppCompatActivity {

    private static final String TAG = "RegimeActivity";

    @BindView(R.id.execution_dateTV)
    TextView execution_dateTV;

    @BindView(R.id.descriptionTV)
    TextView descriptionTV;

    @BindView(R.id.completionTV)
    TextView completionTV;

    @BindView(R.id.coach_commentTV)
    TextView coach_commentTV;

    @BindView(R.id.trainee_commentTV)
    TextView trainee_commentTV;

    @BindView(R.id.exercise_nameTV)
    TextView exercise_nameTV;

    ApiService service;
    TokenManager tokenManager;
    Call<RegimeResponse> call;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_regime);

        ButterKnife.bind(this);
        tokenManager = TokenManager.getInstance(getSharedPreferences("prefs", MODE_PRIVATE));

        if(tokenManager.getToken() == null){
            startActivity(new Intent(RegimeActivity.this, LoginActivity.class));
            finish();
        }

        service = RetrofitBuilder.createServiceWithAuth(ApiService.class, tokenManager);

        call = service.regime(EndPointVariables.getRegimeId());
        call.enqueue(new Callback<RegimeResponse>() {
            @Override
            public void onResponse(Call<RegimeResponse> call, Response<RegimeResponse> response) {
                Log.w(TAG, "onResponse: " + response );
                Regime data = response.body().getData();
                execution_dateTV.setText(data.getExecution_date());
                descriptionTV.setText(data.getDescription());
                completionTV.setText(data.getCompletion());
                coach_commentTV.setText(data.getCoach_comment());
                trainee_commentTV.setText(data.getTrainee_comment());
                exercise_nameTV.setText(data.getExercise_name());

            }

            @Override
            public void onFailure(Call<RegimeResponse> call, Throwable t) {
                Log.w(TAG, "onFailure: " + t.getMessage() );

            }
        });
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        if(call != null){
            call.cancel();
            call = null;
        }
    }
}
