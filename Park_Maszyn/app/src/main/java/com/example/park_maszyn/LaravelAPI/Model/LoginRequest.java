package com.example.park_maszyn.LaravelAPI.Model;

public class LoginRequest {

    private String name;
    private String password;
    private String Token;
    private String email;
    private int stanowisko = 100;

    public LoginRequest(String Name , String Password){
        this.name = Name;
        this.password = Password;

    }
    public LoginRequest(String Name , String Password, int Stanowisko){
        this.name = Name;
        this.password = Password;
        this.stanowisko = Stanowisko;
    }

    public LoginRequest(String Name , String Password, String Token, int Stanowisko){
        this.name = Name;
        this.password = Password;
        this.Token = Token;
        this.stanowisko = Stanowisko;
    }
    public LoginRequest(String Name , String Password, String Token, int Stanowisko, String Email){
        this.name = Name;
        this.password = Password;
        this.Token = Token;
        this.stanowisko = Stanowisko;
        this.email =Email;
    }

    public String getName() {
        return name;
    }

    public String getPassword() {
        return password;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    @Override
    public String toString() {
        return "LoginRequest{" +
                "Name='" + name + '\'' +
                ", Password='" + password + '\'' +
                ", Token='" + Token + '\'' +
                ", Stanowisko=" + stanowisko +
                '}';
    }
}
