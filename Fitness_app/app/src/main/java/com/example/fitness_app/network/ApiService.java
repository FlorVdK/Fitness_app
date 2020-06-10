package com.example.fitness_app.network;

import com.example.fitness_app.entities.AccessToken;
import com.example.fitness_app.entities.RegimeResponse;
import com.example.fitness_app.entities.RegimesResponse;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.Path;

public interface ApiService {


    @POST("register")
    @FormUrlEncoded
    Call<AccessToken> register(@Field("name") String name, @Field("email") String email, @Field("password") String password);

    @POST("login")
    @FormUrlEncoded
    Call<AccessToken> login(@Field("username") String username, @Field("password") String password);

    @POST("logout")
    Call<AccessToken> logout();

    @POST("refresh")
    @FormUrlEncoded
    Call<AccessToken> refresh(@Field("refresh_token") String refreshToken);

    @GET("regimes")
    Call<RegimesResponse> regimes();

    @GET("regime/{id}")
    Call<RegimeResponse> regime(@Path("id") int id);
}
