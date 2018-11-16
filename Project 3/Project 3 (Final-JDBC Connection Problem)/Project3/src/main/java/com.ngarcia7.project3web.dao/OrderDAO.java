package com.ngarcia7.project3web.dao;

import java.util.List;

import com.ngarcia7.project3web.model.CartInfo;
import com.ngarcia7.project3web.model.OrderDetailInfo;
import com.ngarcia7.project3web.model.OrderInfo;
import com.ngarcia7.project3web.model.PaginationResult;

public interface OrderDAO {

    public void saveOrder(CartInfo cartInfo);

    public PaginationResult<OrderInfo> listOrderInfo(int page,
                                                     int maxResult, int maxNavigationPage);

    public OrderInfo getOrderInfo(String orderId);

    public List<OrderDetailInfo> listOrderDetailInfos(String orderId);

}