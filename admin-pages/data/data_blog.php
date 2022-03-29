<?php
//menu = $data_blog
//item = $blog_list[][id_cate]
//id = $blog_list[][id]
global $data_blog;
$data_blog = array("Blog ẩm thực", "Sự kiện giảm giá"); //danh mục bài viết


//id_cate: vị trí của bài viết trong danh mục. VD: 0: tin tức , 1:Sự kiện
//id: stt của bài viết (không được trùng id)
//title: tên bài viết
//author: Tác giả
//date: ngày đăng bài
//content: nội dung bài viết


global $blog_list;
$blog_list = array(
    array('id_cate' => 0, 'id' => 0, 'title' => 'Cách nêm gia vị ngon', 'author' => 'Nguyễn Văn A', 'date' => '11/13/2021', 'content' => 'Muốn nấu ăn ngon thì trước hết phải biết cách nêm nếm gia vị trước đã. Gia vị tuy là yếu tố phụ nhưng lại góp phần quan trọng trong việc quyết định hương vị món ăn. Tưởng chừng là bước đươn giản nhưng không phải ai cũng biết cách nêm gia vị như nào để đảm bảo sức khỏe cho cả gia đình.'),
    array('id_cate' => 0, 'id' => 1, 'title' => 'Mẹo rán gà giòn da, mềm thơm đậm đà', 'author' => 'Nguyễn Văn A', 'date' => '11/14/2021', 'content' => 'Để có cách rán gà giòn da mà thịt phía trong vẫn mềm thơm và đậm đà thì bạn phải có một số bí quyết riêng, trong đó khâu lựa chọn nguyên liệu là rất quan trọng. Bạn nên chọn những con gà sau khi làm xong có trọng lượng khoảng 1,2kg. Sau khi làm sạch thì hãy chặt làm bốn và nhấn mạnh để xương sống gãy đi, thân gà thẳng ra.  Nên sử dụng chảo đáy phẳng để khi rán gà sẽ được ngon và đều hơn.'),
    array('id_cate' => 1, 'id' => 2, 'title' => 'Giảm giá hàng tuần vào thứ 4', 'author' => 'Admin', 'date' => '11/15/2021', 'content' => 'Thứ 4 hàng tuần các món liên quan đến gà giảm giá 30%'),
    array('id_cate' => 1, 'id' => 3, 'title' => 'Giảm giá ngày 1 và 30 hàng tháng', 'author' => 'Admin', 'date' => '11/16/2021', 'content' => 'Ngày 1 và 30 hàng tháng giảm 10% tổng giá trị đơn hàng'),
);
