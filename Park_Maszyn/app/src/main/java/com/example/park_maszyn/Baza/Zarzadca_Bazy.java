package com.example.park_maszyn.Baza;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import androidx.annotation.Nullable;

public class Zarzadca_Bazy extends SQLiteOpenHelper {

    public static String DATABASE_NAME = "Park_Maszyn.db";
    public static int DATABASE_VERSION = 1;
    private String TAG ="Zarzadca_bazy";

    public Zarzadca_Bazy(@Nullable Context context){

        super(context,DATABASE_NAME,null,DATABASE_VERSION);

    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String createTableUser = "CREATE TABLE User"+
                "(_id INTEGER PRIMARY KEY AUTOINCREMENT,"+
                "Id_onSerwer INTEGER, "+
                "Name text, "+
                "Password text, "+
                "Token text," +
                "Stanowisko INTEGER)";
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
