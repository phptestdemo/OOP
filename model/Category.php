<?php



/**
 * summary
 */
class Category extends database
{

    /**
     * lay the loai, loai tin va tin tuc
     * @return obj
     */
    public function getCategory()
    {
    	$sql = "SELECT tl.*, GROUP_CONCAT(DISTINCT lt.id, '|', lt.Ten, '|', lt.TenKhongDau) as Loaitin, 
                tt.id AS idTin, tt.TieuDe, tt.Hinh AS image, 
                tt.TomTat, tt.TieuDeKhongDau, tt.NoiDung, tt.NoiBat, 
                tt.SoLuotXem, tt.created_at AS creat_tin, tt.updated_at AS updated_tin
                FROM theloai tl INNER JOIN loaitin lt ON tl.id = lt.idTheLoai
                INNER JOIN tintuc tt ON tt.idLoaiTin = lt.id
                GROUP BY tl.id";
		$this->setQuery($sql);
		return $this->loadAllRows();
    }

    /**
     * lay tin tuc theo loai tin co phan trang
     * @param  int  $id    [id loai]
     * @param  integer $vitri
     * @param  integer $limit
     * @return obj        
     */
    public function getNewsByIdLoai($id, $vitri = -1, $limit = -1)
    {
        $sql = "SELECT * FROM tintuc WHERE idLoaiTin = $id";

        if ($vitri > -1 && $limit > 1) {
        	$sql .= " limit $vitri, $limit"; // chu co dau cach truoc limit, neu ko phi cach sau $id o tren
        }
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }

    /**
     * lay loai tin theo id
     * @param  int $id
     * @return view    
     */
    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM loaitin WHERE id = $id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function getNewsDetail($id)
    {
    	$sql = "SELECT * FROM tintuc WHERE id = $id";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    public function getComments($idTin)
    {
    	$sql = "SELECT comment.*, users.id as id_users, users.name FROM comment inner join users on comment.idUser = users.id WHERE idTinTuc = $idTin";
        $this->setQuery($sql);
        return $this->loadAllRows(array($idTin));
    }

    public function getNewsRelated($idLoaiTin, $idTin)
    {
    	$sql = "SELECT * FROM tintuc WHERE idLoaiTin = $idLoaiTin AND id <> $idTin limit 5";
    	$this->setQuery($sql);
    	return $this->loadAllRows(array($idLoaiTin));
    }

    public function getNewsHot()
    {
    	$sql = "SELECT * FROM tintuc WHERE NoiBat = 1 ORDER BY created_at DESC LIMIT 3";
    	$this->setQuery($sql);
    	return $this->loadAllRows();
    }
}