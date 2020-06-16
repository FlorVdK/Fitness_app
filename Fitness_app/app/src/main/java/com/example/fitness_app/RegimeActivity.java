package com.example.fitness_app;


import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.NumberPicker;
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

    @BindView(R.id.setsTV)
    TextView setsTV;

    @BindView(R.id.coach_commentTV)
    TextView coach_commentTV;

    @BindView(R.id.exercise_nameTV)
    TextView exercise_nameTV;

    @BindView(R.id.completionNP)
    NumberPicker numberPicker;

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
                setsTV.setText(String.valueOf(data.getSets()));
                coach_commentTV.setText(data.getCoach_comment());
                exercise_nameTV.setText(data.getExercise_name());
                numberPicker.setMaxValue(data.getSets());
                numberPicker.setMinValue(0);
                numberPicker.setValue(data.getCompletion());
                EndPointVariables.setExerciseeId(data.getExercises_id());
            }

            @Override
            public void onFailure(Call<RegimeResponse> call, Throwable t) {
                Log.w(TAG, "onFailure: " + t.getMessage() );

            }
        });
    }

    @OnClick(R.id.saveBTN)
    public void save(){
        int completion = numberPicker.getValue();
        int regime_id = EndPointVariables.getRegimeId();

        call = service.editregime(regime_id, completion);
        call.enqueue(new Callback<RegimeResponse>() {
            @Override
            public void onResponse(Call<RegimeResponse> call, Response<RegimeResponse> response) {
                Toast.makeText(RegimeActivity.this, "updated", Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onFailure(Call<RegimeResponse> call, Throwable t) {
                Toast.makeText(RegimeActivity.this, "update failed", Toast.LENGTH_SHORT).show();
            }
        });
    }

    @OnClick(R.id.exercise_nameTV)
    public void getExercise(){
        startActivity(new Intent(RegimeActivity.this, ExerciseActivity.class));
        finish();
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
