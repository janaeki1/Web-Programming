package com.ngarcia7.project3web.dao;

import com.ngarcia7.project3web.entity.Product;
import com.ngarcia7.project3web.model.PaginationResult;
import com.ngarcia7.project3web.model.ProductInfo;

public interface ProductDAO {



    public Product findProduct(String code);

    public ProductInfo findProductInfo(String code) ;


    public PaginationResult<ProductInfo> queryProducts(int page,
                                                       int maxResult, int maxNavigationPage  );

    public PaginationResult<ProductInfo> queryProducts(int page, int maxResult,
                                                       int maxNavigationPage, String likeName);

    public void save(ProductInfo productInfo);

}