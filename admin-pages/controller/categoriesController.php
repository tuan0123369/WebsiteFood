<?php


include_once '../models/DAO/categoriesDAO.php';
include_once '../models/DTO/categoriesDTO.php';
include_once '../models/DAO/productsDAO.php';

class categoriesController
{
    public function getCate()
    {
        $cate_DAO = new categoriesDAO();
        return $cate_DAO->getAllData();
    }

    public function updateCate($id, $category_name)
    {
        $cate_DAO = new categoriesDAO();
        $cate_DAO->updateCate($id, $category_name);
    }

    public function delCate($id)
    {
        $cate_DAO = new categoriesDAO();
        $cate_DAO->delCate($id);
    }

    public function addCate($cate_name)
    {
        $cate_DAO = new categoriesDAO();
        $cate_DAO->addCate($cate_name);
    }
}

isset($_GET['action']) ? $action = $_GET['action'] : '';
isset($_POST['action']) ? $action = $_POST['action'] : '';
isset($action) ? $action : $action = -1;
switch ($action) {
    case "editCate":
        if (session_id() === '') {
            session_start();
        }
        $category_name = $_POST['category_name'];
        $id = $_GET['id'];
        $cate = new categoriesController();
        $cate->updateCate($id, $category_name);
        $_SESSION['message'] = "Cập nhập thành công";

        header('Location: ../views/itemtittle-editor.php?menu=food&item=' . $id . '');
        break;

    case "delCate":
        if (session_id() === '') {
            session_start();
        }
        $id = $_GET['item'];
        $productDAO = new productsDAO();
        $products = $productDAO->getAllData();
        $flag = true;
        foreach ($products as $prd) {
            if ($prd->getCategoryDTO()->getId() == $id) {
                $_SESSION['message'] = "Không thể xóa danh mục khi vẫn còn sản phẩm";
                $flag = false;
                break;
            }
        }
        if (!$flag) {
            header('Location: ../controller/productsController.php');
        } else {
            $cate_controller = new categoriesController();
            $cate_controller->delCate($id);
            $_SESSION['message'] = "Xóa thành công";
            header('Location: ../controller/productsController.php');
        }
        break;
    case 'addCate':
        if (session_id() === '') {
            session_start();
        }
        $cate_name = $_POST['cate_name'];
        $cate_controller = new categoriesController();
        $cate_controller->addCate($cate_name);
        $_SESSION['message'] = "Thêm thành công";
        header('Location: ../controller/productsController.php');

    default:
        $cate = new categoriesController();
        $list_cate = $cate->getCate();
        include_once '../include/sidebar.php';
        break;
}
