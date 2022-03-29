function formBlog_Validate() {
    $flag = true;
    $title = document.forms['itemBlog']['title'].value;
    $content = document.forms['itemBlog']['content'].value;
    $author = document.forms['itemBlog']['author'].value;
    if ($title == "" || $title == null) {
        document.getElementById('title-warning').innerHTML = "Tiêu đề không được để trống";
        $flag = false;
    } else document.getElementById('title-warning').innerHTML = "";
    if ($content == "" || $content == null) {
        document.getElementById('content-warning').innerHTML = "Nội dung không được để trống";
        $flag = false;
    } else document.getElementById('content-warning').innerHTML = "";
    if ($author == "" || $author == null) {
        document.getElementById('author-warning').innerHTML = "Tác giả không được để trống";
        $flag = false;
    } else document.getElementById('author-warning').innerHTML = "";
    return $flag;
}

function formFood_Validate() {
    $flag = true;
    pattern = /^[\p{L}\s\d]*[\p{L}\s\d]*[\p{L}\s\d]*$/u;
    $title = document.forms['itemFood']['title'].value;
    $decripsion = document.forms['itemFood']['decripsion'].value;
    $price = document.forms['itemFood']['price'].value;
    if ($title == "" || $title == null) {
        document.getElementById('title-warning').innerHTML = "Tên món ăn không được để trống"
        $flag = false;
    } else if (!$title.match(pattern)) {
        document.getElementById('title-warning').innerHTML = "Chứa kí tự không hợp lệ"
        $flag = false;
    } else document.getElementById('title-warning').innerHTML = "";

    if ($decripsion == "" || $decripsion == null) {
        document.getElementById('decripsion-warning').innerHTML = "Mô tả không được để trống"
        $flag = false;
    } else if (!$decripsion.match(pattern)) {
        document.getElementById('decripsion-warning').innerHTML = "Chứa kí tự không hợp lệ"
        $flag = false;
    } else document.getElementById('decripsion-warning').innerHTML = "";

    if ($price == "" || $price == null) {
        document.getElementById('price-warning').innerHTML = "Giá không được để trống"
        $flag = false;
    } else document.getElementById('price-warning').innerHTML = "";

    return $flag;
}