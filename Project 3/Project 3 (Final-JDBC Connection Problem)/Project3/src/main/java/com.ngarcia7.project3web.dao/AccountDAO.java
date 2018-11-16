package com.ngarcia7.project3web.dao;

import com.ngarcia7.project3web.entity.Account;
import com.ngarcia7.project3web.model.AccountInfo;

public interface AccountDAO {


    public Account findAccount(String userName );

    public void saved(AccountInfo accountInfo);

}