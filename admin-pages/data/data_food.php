<?php
//     global $data_food;
//     $data_food = array("Gà rán","Bugger","Pizza","Salad","Tacos","Đồ uống");//danh mục thức ăn

// //id_cate: vị trí của thức ăn trong danh mục. VD: 0: Gà rán , 1:Bugger
// //id: stt của thức ăn (không được trùng id)
// //title: tên món ăn
// //decripsion: Mô tả món ăn
// //price: giá món



//     global $food_list; 
//     $food_list = array(
//         array('id_cate' => 0, 'id' => 0, 'title' => 'Gà truyền thống', 'decripsion' => 'Gà rán vỏ giòn truyền thống',  'price' => '79000'), 
//         array('id_cate' => 0, 'id' => 1, 'title' => 'Gà sốt BBQ Hàn Quấc', 'decripsion' => 'Gà rán vỏ giòn rưới sốt BBQ của Hàn Quấc',  'price' => '83000'), 
//         array('id_cate' => 0, 'id' => 2, 'title' => 'Gà Không xương style popeyes', 'decripsion' => 'Gà rán giòn không xương(3 miếng 1 phần)',  'price' => '80000'),
//         array('id_cate' => 0, 'id' => 3, 'title' => 'Gà sốt cay Hàn Quấc', 'decripsion' => 'Gà rán rưới sốt cay cấp độ 1',  'price' => '82000'), 
//         array('id_cate' => 0, 'id' => 4, 'title' => 'Gà sốt siêu cay hàn quấc', 'decripsion' => 'Gà rán rưới sốt cay cấp độ 2',  'price' => '82000'), 
//         array('id_cate' => 0, 'id' => 5, 'title' => 'Gà cay bóng đêm Hàn Quấc', 'decripsion' => 'Gà rán rưới sốt cay cấp độ 3',  'price' => '82000'), 
//         array('id_cate' => 1, 'id' => 6, 'title' => 'Burger bò cơ bản', 'decripsion' => 'Burger bò với phần nhân bò dày 1cm',  'price' => '59000'), 
//         array('id_cate' => 1, 'id' => 7, 'title' => 'Burger tôm', 'decripsion' => 'Burger với phần nhân tôm cùng sốt hải sản',  'price' => '63000'), 
//         array('id_cate' => 1, 'id' => 8, 'title' => 'Burger gà', 'decripsion' => 'Burger với phần nhân gà không xương tẩm bột chiên giòn',  'price' => '59000'), 
//         array('id_cate' => 1, 'id' => 9, 'title' => 'Burger chay', 'decripsion' => 'Burger bới phần nhân từ nấm và bông cải xanh',  'price' => '47000'), 
//         array('id_cate' => 1, 'id' => 10, 'title' => 'Burger bò big size', 'decripsion' => 'Burger bới phần nhân từ nấm và bông cải xanh',  'price' => '82000'), 
//         array('id_cate' => 1, 'id' => 11, 'title' => 'Burger Thanh long Việt Nam', 'decripsion' => 'Vỏ burger chế biến cùng thanh long đặc biệt chỉ có ở việt nam và phần nhân bò từ bò nội địa',  'price' => '62000'), 
//         array('id_cate' => 2, 'id' => 12, 'title' => 'Pizza cơ bản', 'decripsion' => 'Pizza với phần đế bình thường và topping bao gồm thịt nguội, xúc xích, phô mai, sốt cà chua',  'price' => '80000'), 
//         array('id_cate' => 2, 'id' => 13, 'title' => 'Pizza Bò', 'decripsion' => 'Pizza với phần đế cơ bản với topping là bò xay, sốt cà chua, phô mai cùng với thơm',  'price' => '86000'), 
//         array('id_cate' => 2, 'id' => 14, 'title' => 'Pizza đế nhồi xúc xích', 'decripsion' => 'Pizza với phần đế nhồi phô mai và phần topping bao gồm thịt nguội, xúc xích, phô mai',  'price' => '59000'), 
//         array('id_cate' => 2, 'id' => 15, 'title' => 'Pizza chay Bông cải xanh', 'decripsion' => 'Pizza chay 100% với topping bông cải xanh, nấm đông cô, thơm, trái olive, phô mai chay, ngũ cốc',  'price' => '77000'), 
//         array('id_cate' => 2, 'id' => 16, 'title' => 'Pizza big size kiểu ý', 'decripsion' => 'Pizza truyền thống kiểu ý với đường kính 60 cm cùng nguyên liệu, hương vị chuẩn ý',  'price' => '200000'), 
//         array('id_cate' => 2, 'id' => 17, 'title' => 'Pizza thanh long việt Nam', 'decripsion' => 'Sản phẩm thuộc loại đồ ngọt với phần vỏ bánh chế biến cùng với thanh long việt nam, phần topping gồm các loại trái cây nhiệt đới',  'price' => '77000'), 
//         array('id_cate' => 3, 'id' => 18, 'title' => 'Salad gà cơ bản', 'decripsion' => 'Sadlad có phần topping là gà rán viên giòn',  'price' => '59000'), 
//         array('id_cate' => 3, 'id' => 19, 'title' => 'Salad Tôm', 'decripsion' => 'Salad có phần topping là tôm chiên giòn',  'price' => '69000'), 
//         array('id_cate' => 3, 'id' => 20, 'title' => 'Salad hoa quả', 'decripsion' => 'Salad thuần chay với phần topping quả nhiệt đới',  'price' => '59000'), 
//         array('id_cate' => 3, 'id' => 21, 'title' => 'Salad kiểu nga', 'decripsion' => 'Salad truyền thống của nga',  'price' => '80000'), 
//         array('id_cate' => 3, 'id' => 22, 'title' => 'Salad bơ', 'decripsion' => 'Salad sốt bơ',  'price' => '46000'), 
//         array('id_cate' => 3, 'id' => 23, 'title' => 'Salad Thanh Long Việt Nam', 'decripsion' => 'Sản phẩm ngọt với salad và thanh long Việt nam',  'price' => '62000'), 
//         array('id_cate' => 4, 'id' => 24, 'title' => 'Tacos truyền thống', 'decripsion' => 'Phần gồm 2 chiếc tacos nhân bò',  'price' => '59000'), 
//         array('id_cate' => 4, 'id' => 25, 'title' => 'Tacos Hải sản', 'decripsion' => 'Phần gồm 2 chiếc Tacos, 1 nhân tôm và 1 nhân cua',  'price' => '63000'), 
//         array('id_cate' => 4, 'id' => 26, 'title' => 'Tacos nhân gà', 'decripsion' => 'Phần gồm 2 chiếc với nhân gà ướp',  'price' => '59000'), 
//         array('id_cate' => 4, 'id' => 27, 'title' => 'Tacos chay avocado', 'decripsion' => 'Tacos với phần nhân gồm bơ, ngũ cốc',  'price' => '47000'), 
//         array('id_cate' => 4, 'id' => 28, 'title' => 'Tacos Thanh Long việt Nam', 'decripsion' => 'Gồm 2 chiếc, Tacos có phần võ làm cùng với thanh long ruột đỏ của việt nam và phần nhân truyền thống',  'price' => '82000'), 
//         array('id_cate' => 4, 'id' => 29, 'title' => 'Tacos kiểu ấn', 'decripsion' => 'Phần nhân bánh có hương vị cà ri của ấn độ',  'price' => '42000'), 
//         array('id_cate' => 5, 'id' => 30, 'title' => 'PepSi', 'decripsion' => 'PepSi lon',  'price' => '12000'), 
//         array('id_cate' => 5, 'id' => 31, 'title' => 'Trà Dâu', 'decripsion' => 'Ly 500ml',  'price' => '28000'), 
//         array('id_cate' => 5, 'id' => 32, 'title' => 'Trà ô long', 'decripsion' => 'ly 500ml',  'price' => '23000'), 
//         array('id_cate' => 5, 'id' => 33, 'title' => 'Trà Dâu tằm', 'decripsion' => 'Ly 500ml',  'price' => '23000'), 
//         array('id_cate' => 5, 'id' => 34, 'title' => 'Milo', 'decripsion' => 'Milo lon',  'price' => '15000'), 
//         array('id_cate' => 5, 'id' => 35, 'title' => 'Nước Ép Thanh Long', 'decripsion' => 'Ly 500ml',  'price' => '32000'), 
//   );
?>