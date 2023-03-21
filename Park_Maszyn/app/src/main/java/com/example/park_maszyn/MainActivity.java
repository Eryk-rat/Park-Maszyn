package com.example.park_maszyn;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.example.park_maszyn.LaravelAPI.LaravelCall;
import com.example.park_maszyn.LaravelAPI.Model.LoginRequest;
import com.example.park_maszyn.databinding.ActivityMainBinding;
import com.google.android.material.snackbar.Snackbar;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class MainActivity extends AppCompatActivity {

    private ActivityMainBinding binding;

    //--------------Elementy widoku---------------------//

    private EditText name;
    private EditText password;
    private Button login;

    //-------------Zmienne pomocnicze------------------//

    private String TAG = "Main Activity";
    private LoginRequest loginAnser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        SharedPreferences sharedPreferences = getSharedPreferences("myPrefs", MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();

        //--------Adres serwera aplikacji -------------//
        String LaravelURL = "http://192.168.10.237:8000";

        editor.putString("LaravelURL", LaravelURL);
        editor.apply();

        //---------------------------------------------//

        binding = ActivityMainBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());
        View root = binding.getRoot();

        //--------Elementy widoku akcje --------------//

        name = findViewById(R.id.login_name);


        password = findViewById(R.id.login_password);

        login = findViewById(R.id.login_button);

        //---------Dane do połączenia serwera---------//


        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(LaravelURL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();
        LaravelCall laravelCall = retrofit.create(LaravelCall.class);

        //--------Kliknięcie przycisku--------------//

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String name_str = name.getText().toString();
                Log.i(TAG, "POBRANE Z NAME : " + name_str);
                String password_str = password.getText().toString();
                Log.i(TAG, "POBRANE Z PASSWORD : " + password_str);

                LoginRequest loginRequest = new LoginRequest(name_str,password_str);

                Call<LoginRequest> callLogin = laravelCall.login(loginRequest);



                callLogin.enqueue(new Callback<LoginRequest>() {
                    @Override
                    public void onResponse(Call<LoginRequest> call, Response<LoginRequest> response) {
                        Log.i(TAG, response.body().toString());
                        loginAnser = response.body();
                        Snackbar.make(v, "Odpowiedź z serwera " + loginAnser.getName(), Snackbar.LENGTH_LONG)
                                .setAction("Action", null).show();
                    }

                    @Override
                    public void onFailure(Call<LoginRequest> call, Throwable t) {
                        Log.i(TAG, t.toString());
                        Snackbar.make(v, "Błąd połaczenia " + t, Snackbar.LENGTH_LONG)
                                .setAction("Action", null).show();
                    }
                });
            }
        });

    }
}