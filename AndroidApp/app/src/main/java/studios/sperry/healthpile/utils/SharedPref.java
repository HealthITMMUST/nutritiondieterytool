package studios.sperry.healthpile.utils;

import android.content.Context;
import android.content.SharedPreferences;

public class SharedPref {

    private SharedPreferences default_prefence;

    public SharedPref(Context context) {
        default_prefence = context.getSharedPreferences("healthpile", Context.MODE_PRIVATE);
    }

    public void setIsFirstTime(boolean isFirstTime) {
        default_prefence.edit().putBoolean("isFirstTime", isFirstTime).apply();
    }

    public boolean isFirstTime() {
        return default_prefence.getBoolean("isFirstTime", true);
    }

    public String getFirstName() {
        return default_prefence.getString("firstName", null);
    }

    public void setFirstName(String firstName) {
        default_prefence.edit().putString("firstName", firstName).apply();
    }

    public String getLastName() {
        return default_prefence.getString("lastName", null);
    }

    public void setLastName(String lastName) {
        default_prefence.edit().putString("lastName", lastName).apply();
    }

    public String getUserName() {
        return default_prefence.getString("username", null);
    }

    public void setUserName(String username) {
        default_prefence.edit().putString("username", username).apply();
    }

    public String getPhoneNumber() {
        return default_prefence.getString("phoneNumber", null);
    }

    public void setPhoneNumber(String phoneNumber) {
        default_prefence.edit().putString("phoneNumber", phoneNumber).apply();
    }

    public String getNationalId() {
        return default_prefence.getString("nationalId", null);
    }

    public void setNationalId(String nationalId) {
        default_prefence.edit().putString("nationalId", nationalId).apply();
    }

    public String getEmailAddress() {
        return default_prefence.getString("emailAddress", null);
    }

    public void setEmailAddress(String emailAddress) {
        default_prefence.edit().putString("emailAddress", emailAddress).apply();
    }

    public String getPostalCode() {
        return default_prefence.getString("postalCode", null);
    }

    public void setPostalCode(String postalCode) {
        default_prefence.edit().putString("postalCode", postalCode).apply();
    }

    public String getCountyName() {
        return default_prefence.getString("county", null);
    }

    public void setCountyName(String county) {
        default_prefence.edit().putString("county", county).apply();
    }

    public String getPassportPhoto() {
        return default_prefence.getString("passportPhoto", null);
    }

    public void setPassportPhoto(String passportPhoto) {
        default_prefence.edit().putString("passportPhoto", passportPhoto).apply();
    }

    public String getPaymentMethod() {
        return default_prefence.getString("paymentMethod", null);
    }

    public void setPaymentMethod(String paymentMethod) {
        default_prefence.edit().putString("paymentMethod", paymentMethod).apply();
    }

    public String getRoleID() {
        return default_prefence.getString("roleID", null);
    }

    public void setRoleID(String roleID) {
        default_prefence.edit().putString("roleID", roleID).apply();
    }

    public String getLoggedInUserID() {
        return default_prefence.getString("loggedInUserID", null);
    }

    public void setLoggedInUserID(String loggedInUserID) {
        default_prefence.edit().putString("loggedInUserID", loggedInUserID).apply();
    }
    public void logOut() {
        default_prefence.edit().clear().apply();
        setIsFirstTime(false);
    }

    public String getVehicleType() {
        return default_prefence.getString("vehicleType", null);
    }

    public void setVehicleType(String vehicleType) {
        default_prefence.edit().putString("vehicleType", vehicleType).apply();
    }

    public String getPlateNumber() {
        return default_prefence.getString("plateNumber", null);
    }

    public void setPlateNumber(String plateNumber) {
        default_prefence.edit().putString("plateNumber", plateNumber).apply();
    }

    public String getVehicleArrayList() {
        return default_prefence.getString("vehicleArrayList", null);
    }

    public void setVehicleArrayList(String vehicleArrayList) {
        default_prefence.edit().putString("vehicleArrayList", vehicleArrayList).apply();
    }

    public String getLuggageNatureArrayList() {
        return default_prefence.getString("luggageNatureArrayList", null);
    }

    public void setLuggageNatureArrayList(String luggageNatureArrayList) {
        default_prefence.edit().putString("luggageNatureArrayList", luggageNatureArrayList).apply();
    }



}
