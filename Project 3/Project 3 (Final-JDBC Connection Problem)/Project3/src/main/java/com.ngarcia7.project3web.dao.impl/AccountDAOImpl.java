package com.ngarcia7.project3web.dao.impl;

import com.ngarcia7.project3web.model.AccountInfo;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.Query;
import org.hibernate.SessionFactory;
import org.hibernate.criterion.Restrictions;
import com.ngarcia7.project3web.dao.AccountDAO;
import com.ngarcia7.project3web.entity.Account;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.transaction.annotation.Transactional;



// Transactional for Hibernate
@Transactional
public class AccountDAOImpl implements AccountDAO {

    @Autowired
    private SessionFactory sessionFactory;

    @Override
    public Account findAccount(String userName ) {
        Session session = sessionFactory.getCurrentSession();
        Criteria crit = session.createCriteria(Account.class);
        crit.add(Restrictions.eq("userName", userName));
        return (Account) crit.uniqueResult();
    }

    @Override
    public void saved(AccountInfo accountInfo) {

        Account account = null;

        boolean isNew = false;
        if (account == null) {
            isNew = true;
            account = new Account();
        }
        account.setUserName(accountInfo.getUserName());
        account.setPassword(accountInfo.getPassword());
        account.setUserRole(accountInfo.getUserRole());
        account.setActive(accountInfo.isActive());

        if (isNew) {
            this.sessionFactory.getCurrentSession().persist(account);
        }
        this.sessionFactory.getCurrentSession().flush();
    }



}