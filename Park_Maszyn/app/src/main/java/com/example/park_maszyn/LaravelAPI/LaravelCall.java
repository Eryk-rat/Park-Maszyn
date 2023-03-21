package com.example.park_maszyn.LaravelAPI;

import com.example.park_maszyn.LaravelAPI.Model.LoginRequest;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.POST;

public interface LaravelCall {


    @POST("api/login")
    Call<LoginRequest> login (@Body LoginRequest loginRequest);
}
