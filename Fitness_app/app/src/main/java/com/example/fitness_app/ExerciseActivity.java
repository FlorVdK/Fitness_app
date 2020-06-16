package com.example.fitness_app;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.fitness_app.entities.EndPointVariables;
import com.example.fitness_app.entities.Exercise;
import com.example.fitness_app.entities.ExerciseResponse;
import com.example.fitness_app.entities.RegimeResponse;
import com.example.fitness_app.network.ApiService;
import com.example.fitness_app.network.RetrofitBuilder;
import com.squareup.picasso.Picasso;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ExerciseActivity extends AppCompatActivity {

    @BindView(R.id.name)
    TextView name;

    @BindView(R.id.decription_exercise)
    TextView decription_exercise;

    @BindView(R.id.image)
    ImageView image;

    ApiService service;
    TokenManager tokenManager;
    Call<ExerciseResponse> call;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_exercise);

        ButterKnife.bind(this);
        tokenManager = TokenManager.getInstance(getSharedPreferences("prefs", MODE_PRIVATE));

        if(tokenManager.getToken() == null){
            startActivity(new Intent(ExerciseActivity.this, LoginActivity.class));
            finish();
        }

        service = RetrofitBuilder.createServiceWithAuth(ApiService.class, tokenManager);

        call = service.exercise(EndPointVariables.getExerciseeId());
        call.enqueue(new Callback<ExerciseResponse>() {
            @Override
            public void onResponse(Call<ExerciseResponse> call, Response<ExerciseResponse> response) {
                Exercise data = response.body().getData();
                name.setText(data.getName());
                decription_exercise.setText((data.getDescription()));
                loadImageFromUrl(data.getSrc_image());
            }

            @Override
            public void onFailure(Call<ExerciseResponse> call, Throwable t) {

            }
        });
    }

    private void loadImageFromUrl(String src_image) {
        Picasso.get().load("http://425aff5b6d44.ngrok.io/storage/" + src_image).resize(600, 200).into(image);
    }
}
