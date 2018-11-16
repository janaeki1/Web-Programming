package com.ngarcia7.project3web.model;

import com.ngarcia7.project3web.entity.Account;
import org.springframework.web.multipart.commons.CommonsMultipartFile;

public class AccountInfo {
    private String username;
    private String password;
    private String userRole;
    private boolean active;


    private boolean newProduct=false;

    // Upload file.
    private CommonsMultipartFile fileData;

    public AccountInfo() {
    }

    public AccountInfo(Account account) {
        this.username = account.getUserName();
        this.password = account.getPassword();
        this.userRole = account.getUserRole();
        this.active = account.isActive();
    }

    public AccountInfo(String username, String password, String role, boolean active) {
        this.username = username;
        this.password = password;
        this.userRole = role;
        this.active = active;
    }

    public String getUserName() {
        return username;
    }

    public void setUserName(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getUserRole() {
        return userRole;
    }

    public void setUserRole(String role) {
        this.userRole = role;
    }

    public boolean isActive() {
        return active;
    }

    public void setActive(boolean active) {
        this.active = active;
    }

}