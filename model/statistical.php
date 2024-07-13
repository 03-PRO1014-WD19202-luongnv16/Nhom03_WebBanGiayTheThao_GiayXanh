<?php

function Most_purchased_products(){
        $sql = "SELECT od.id_product, p.name, od.dongia, p.image,      
                COUNT(od.id_product) AS `luotmua`, 
                SUM(od.soluong) AS 'soluongmua', 
                SUM(od.soluong) *  od.dongia AS 'tonggia'
                FROM order_detail od 
                JOIN product p ON od.id_product = p.product_id 
                GROUP BY od.id_product, p.name
                ORDER BY SUM(od.soluong) DESC;";
        return pdo_query($sql);
}
function total_order(){
        $sql = "SELECT COUNT(id) as tongDon
                FROM `order` ";
        return pdo_query_value($sql);
}
function total_customer(){
        $sql = "SELECT COUNT(user_id) as khachhang
                FROM `user`  where role =1";
        return pdo_query_value($sql);
}
function total_product(){
        $sql = "SELECT COUNT(product_id) as product
                FROM `product` ";
        return pdo_query_value($sql);
}
function total_category(){
        $sql = "SELECT COUNT(cate_id) as category
                FROM `categories` ";
        return pdo_query_value($sql);
}
function total_product_order(){
        $sql = "SELECT SUM(soluong) as soluong
                FROM `order_detail` ";
        return pdo_query_value($sql);
}
function Number_of_goods_in_stock(){
        $sql ="SELECT (SUM(product_quantity) - (SELECT SUM(soluong) as soluong
        FROM `order_detail`) ) as 'SoLuongTonKho' FROM product     ";
        return pdo_query_value($sql);
}
function total_comment(){
        $sql ="SELECT COUNT(comment_id) FROM comments";
        return pdo_query_value($sql);
}
function total_brand(){
        $sql ="SELECT COUNT(brand_id) FROM brand";
        return pdo_query_value($sql);
}
function total_best_selling_brand(){
        $sql = "SELECT p.brand_id, b.brand_name,   
        COUNT(p.brand_id) AS luotmua, 
        SUM(od.soluong) AS soluongmua, 
        SUM(od.soluong * od.dongia) AS tonggia
        FROM order_detail od 
        JOIN product p ON od.id_product = p.product_id 
        JOIN brand b ON b.brand_id = p.brand_id
        GROUP BY p.brand_id, b.brand_name
        ORDER BY SUM(od.soluong * od.dongia) DESC";
        return pdo_query($sql);
}
